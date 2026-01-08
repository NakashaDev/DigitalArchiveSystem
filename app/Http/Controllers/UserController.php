<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Rules\IsValidPassword;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:user-management');
    }

    /**
     * Show the user list.
     */
    public function index(Request $request)
    {
        $prevInfo = session('users-pagination', [
            'page' => 1, 'perPage' => config('pagination.perPage')
        ]);

        $curPage = $request->input('page', $prevInfo['page']);
        if ($request->has('perPage')) {
            $perPage = $request->input('perPage');
            $curPage = 1;
        } else {
            $perPage = $prevInfo['perPage'];
        }

        $users = User::offset(($curPage - 1) * $perPage)->limit($perPage)->get();
        $total = User::count();

        session(['users-pagination' => ['page' => $curPage, 'perPage' => $perPage]]);

        return view('user.index', ['users' => $users, 'curPage' => $curPage, 'perPage' => $perPage, 'total' => $total]);
    }

    /**
     * ユーザー登録画面
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        // グループのリストを取得する
        $userGroups = Role::all()->pluck('name_ja', 'name');

        return view('user.create', [
            'userGroups' => $userGroups
        ]);
    }

    /**
     * Show user editing.
     */
    public function edit($id)
    {
        $user = User::whereId($id)->first();
        if (empty($user)) {
            return redirect()->route('users.index');
        }

        // 現在のグループを確認
        $curGroupId = $user->getRoleNames();

        // グループのリストを取得する
        $userGroups = Role::all()->pluck('name_ja', 'name');

        return view('user.edit', [
            'user' => $user,
            'curGroupId' => ($curGroupId[0] ?? ''),
            'userGroups' => $userGroups
        ]);
    }

    /**
     * Insert new user
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|max:128',
            'email' => 'required|unique:users|email',
            'password' => ['required', 'min:8', 'confirmed', new IsValidPassword()],
            'group' => 'required',
        ])->setAttributeNames([
            'name' => '名前', 'email' => 'メールアドレス', 'password' => 'パスワード',
            'group' => 'グループ'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('users.create')
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // ユーザー情報を保存する
            $user = new User();
            $user->fill($request->only(['name', 'email']));
            $user->password = Hash::make($request->input('password'));
            $user->save();

            // ユーザーにグループを付与する
            $groupId = $request->input('group');
            $user->assignRole($groupId);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            return back()->with(['failed' => __('messages.error_occurred')]);
        }

        return back()->with(['success' => __('messages.S001', ['name' => 'ユーザー'])]);
    }

    /**
     * Update existing user.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name,' . $id . '|max:128',
            'email' => 'required|unique:users,email,' . $id . '|email',
            'password' => ['nullable', 'min:8', 'confirmed', new IsValidPassword()],
            'group' => 'required',
        ])->setAttributeNames([
            'name' => '名前', 'email' => 'メールアドレス', 'password' => 'パスワード',
            'group' => 'グループ'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('users.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // ユーザー情報を保存する
            $user = User::findOrFail($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if ($request->input('password'))
                $user->password = Hash::make($request->input('password'));
            $user->save();

            // ユーザーにグループを付与する
            $groupId = $request->input('group');
            $user->assignRole($groupId);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            return back()->with(['failed' => __('messages.error_occurred')]);
        }

        return back()->with(['success' => __('messages.S002', ['name' => 'ユーザー'])]);
    }

    /**
     * 指定のユーザーを削除する
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!empty($user)) {
            $user->syncRoles([]);
            $user->delete();
        }
        return back()->with(['success' => __('messages.S003', ['name' => 'ユーザー'])]);
    }

    /**
     * 複数のユーザーを選択して一括削除する
     */
    public function delete(Request $request)
    {
        $selIds = $request->input('sel', []);

        // 入力検証：配列かつ整数のみ許可
        if (!is_array($selIds) || empty($selIds)) {
            return back()->with(['failed' => __('messages.invalid_input')]);
        }

        // 整数以外の値を除外
        $selIds = array_filter($selIds, function($id) {
            return is_numeric($id) && $id > 0;
        });

        if (empty($selIds)) {
            return back()->with(['failed' => __('messages.invalid_input')]);
        }

        // 自分自身は削除できない
        $currentUserId = auth()->id();
        if (in_array($currentUserId, $selIds)) {
            return back()->with(['failed' => __('messages.cannot_delete_self')]);
        }

        DB::beginTransaction();
        try {
            // グループ設定を解除する
            $users = User::whereIn('id', $selIds)->get();
            foreach ($users as $user) {
                $user->syncRoles([]);
            }

            // 一括削除
            User::destroy($selIds);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            return back()->with(['failed' => __('messages.error_occurred')]);
        }

        return back()->with(['success' => __('messages.S004', ['name' => 'ユーザー'])]);
    }
}
