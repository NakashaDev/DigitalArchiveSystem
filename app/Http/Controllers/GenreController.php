<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enums\LangCode;
use App\Models\CollectionGenre;
use App\Models\CollectionGenreLang;

class GenreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:genre-settings');
    }

    /**
     * 分類一覧画面
     */
    public function index(Request $request)
    {
        $prevInfo = session('genre-pagination', [
            'page' => 1, 'perPage' => config('pagination.perPage'), 'lang' => LangCode::JAPANESE
        ]);

        $curPage = $request->input('page', $prevInfo['page']);
        $lang = $request->input('lang', $prevInfo['lang']);
        if ($request->has('perPage')) {
            $perPage = $request->input('perPage');
            $curPage = 1;
        } else {
            $perPage = $prevInfo['perPage'];
        }

        $keyword = $request->input('keyword', '');

        $langs = CollectionGenreLang::where('lang_code', $lang);
        $genres = CollectionGenre::joinSub($langs, 'genre_lang', function($join) {
                    $join->on('collection_genres.collection_genre_id', '=', 'genre_lang.collection_genre_id');
                })
                ->select('collection_genres.*', 'genre_lang.genre_name', 'genre_lang.genre_name_v')
                ->where('genre_code', 'like', "%{$keyword}%")
                ->orWhere('genre_name_v', 'like', "%{$keyword}%");

        $total = $genres->count();
        $result = $genres->offset(($curPage - 1) * $perPage)
                ->limit($perPage)
                ->get();

        session(['genre-pagination' => ['page' => $curPage, 'perPage' => $perPage, 'lang' => $lang]]);

        return view('genre.index', [
            'keyword' => $keyword,
            'genres' => $result, 
            'curPage' => $curPage, 
            'perPage' => $perPage, 
            'total' => $total
        ]);
    }

    /**
     * 新規分類作成画面
     */
    public function create(Request $request, $id)
    {
        $record = $this->_makeEmptyRecord();
        
        if ($id > 0) {
            $genre = CollectionGenre::findOrFail($id);
            if (!$genre) return redirect()->route('genre.index');

            $langs = CollectionGenreLang::where('collection_genre_id', '=', $id)->get();
            foreach ($langs as $lang) {
                $record['name_' . $lang->lang_code] = $lang->genre_name;
                $record['name_v_' . $lang->lang_code] = $lang->genre_name_v;
            }
        }

        $maxCode = CollectionGenre::max('genre_code');
        $maxCode = !$maxCode ? '01' : str_pad(intval($maxCode) + 1, 2, '0', STR_PAD_LEFT);

        $maxOrder = CollectionGenre::max('genre_order');
        $maxOrder = !$maxOrder ? 1 : $maxOrder + 1;

        $genres = CollectionGenreLang::where('lang_code', '=', 1)->get()->pluck('genre_name', 'collection_genre_id');
        return view('genre.create', ['record' => $record, 'genres' => $genres, 'maxCode' => $maxCode, 'maxOrder' => $maxOrder, 'id' => $id]); 
    }

    /**
     * 分類追加処理
     */
    public function store(Request $request)
    {
        $validator = $this->_makeValidator($request->all());
        if ($validator->fails()) {
            return redirect()
                ->route('genre.create', ['id' => $request->input('create_id', 0)])
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // 分類追加
            $genre = new CollectionGenre();
            $genre->genre_code = $request->input('code');
            $genre->genre_order = $request->input('order');
            $genre->save();

            // 分類詳細追加
            foreach (LangCode::asArray() as $key=>$val) {
                $lang = new CollectionGenreLang();
                $lang->collection_genre_id = $genre->collection_genre_id;
                $lang->lang_code = $val;
                $lang->genre_name = $request->input('name_' . $val);
                $lang->genre_name_v = $request->input('name_v_' . $val);
                $lang->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            return back()->with(['failed' => __('messages.error_occurred')]);
        }

        return back()->with(['success' => __('messages.S001', ['name' => '分類'])]);
    }

    /**
     * 分類編集画面
     */
    public function edit($id)
    {
        $record = $this->_makeEmptyRecord();
        $genre = CollectionGenre::findOrFail($id);
        if (!$genre)
            return redirect()->route('genre.index');

        $record['code'] = $genre->genre_code;
        $langs = CollectionGenreLang::where('collection_genre_id', '=', $id)->get();
        foreach ($langs as $lang) {
            $record['name_' . $lang->lang_code] = $lang->genre_name;
            $record['name_v_' . $lang->lang_code] = $lang->genre_name_v;
        }

        $genres = CollectionGenreLang::where('lang_code', '=', 1)->get()->pluck('genre_name', 'collection_genre_id');

        return view('genre.edit', ['id' => $id, 'record' => $record, 'genres' => $genres]);
    }

    /**
     * 
     */
    private function _makeEmptyRecord() {
        $record = ['code'=>''];
        foreach (LangCode::asArray() as $key=>$val) {
            $record['name_' . $val] = '';
            $record['name_v_' . $val] = '';
        }

        return $record;
    }

    /**
     * 入力チェック
     */
    private function _makeValidator($inputs) {
        $rules = ['duplicate_genre' => 'required_if:is_duplicate,==,1'];
        $attributes = ['duplicate_genre' => '複製する分類', 'is_duplicate' => '複製する'];
        foreach (LangCode::asArray() as $key=>$val) {
            $rules['name_' . $val] = 'required|max:128';
            $rules['name_v_' . $val] = 'required|max:128';
            $attributes['name_' . $val] = LangCode::getDescription($val) . '分類名';
            $attributes['name_v_' . $val] = LangCode::getDescription($val) . '短縮名';
        }

        $validator = Validator::make($inputs, $rules)->setAttributeNames($attributes);

        return $validator;
    }   

    /**
     * 分類更新
     */
    public function update(Request $request, $id)
    {
        $validator = $this->_makeValidator($request->all());
        if ($validator->fails()) {
            return redirect()
                ->route('genre.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // 分類詳細追加
            $upsertRows = [];
            foreach (LangCode::asArray() as $key=>$val) {
                $upsertRows[] = ['collection_genre_id'=>$id, 'lang_code'=>$val, 'genre_name'=>$request->input('name_' . $val), 'genre_name_v'=>$request->input('name_v_' . $val)];
            }

            CollectionGenreLang::upsert($upsertRows, ['collection_genre_id', 'lang_code'], ['genre_name', 'genre_name_v']);
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            report($e);
            return back()->with(['failed' => __('messages.error_occurred')]);
        }

        return back()->with(['success' => __('messages.S002', ['name' => '分類'])]);
    }

    /**
     * 指定の分類を削除する
     */
    public function destroy($id)
    {
        $genre = CollectionGenre::findOrFail($id);
        if (!empty($genre)) {
            DB::beginTransaction();
            try {
                // 分類詳細も削除
                CollectionGenreLang::where('collection_genre_id', '=', $id)->delete();
                $genre->delete();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                report($e);
                return back()->with(['failed' => __('messages.error_occurred')]);
            }
        }
        return back()->with(['success' => __('messages.S003', ['name' => '分類'])]);
    }

    /**
     * 分類の項目設定画面
     */
    public function setting($id)
    {
        return view('genre.setting');
    }
}
