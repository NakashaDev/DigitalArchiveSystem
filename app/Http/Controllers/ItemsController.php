<?php

namespace App\Http\Controllers;

use DB;
use App\Enums\LangCode;
use App\Models\CollectionItem;
use App\Models\CollectionItemLang;
use App\Models\GenreHasItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ItemsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:item-management');
    }

    /**
     * 項目一覧画面
     */
    public function index(Request $request)
    {
        $prevInfo = session('item-pagination', [
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

        $hasGenre = GenreHasItem::select('collection_item_id', DB::Raw('count(collection_genre_id) as genre_count'))->groupBy('collection_item_id');
        $langs = CollectionItemLang::where('lang_code', $lang);
        $items = CollectionItem::joinSub($langs, 'item_lang', function($join) {
                    $join->on('collection_items.collection_item_id', '=', 'item_lang.item_id');
                })
                ->leftJoinSub($hasGenre, 'item_count', function($join) {
                    $join->on('collection_items.collection_item_id', '=', 'item_count.collection_item_id');
                })
                ->select('collection_items.*', 'item_lang.item_label', 'item_count.genre_count')
                ->where('item_label', 'like', "%{$keyword}%")
                ->orWhere('item_name', 'like', "%{$keyword}%")
                ->orderBy('item_order', 'ASC');

        $total = $items->count();
        $result = $items->offset(($curPage - 1) * $perPage)
                ->limit($perPage)
                ->get();

        session(['item-pagination' => ['page' => $curPage, 'perPage' => $perPage, 'lang' => $lang]]);

        return view('item.index', [
            'items' => $result,
            'keyword' => $keyword,
            'curPage' => $curPage, 
            'perPage' => $perPage, 
            'total' => $total
        ]);
    }

    /**
     * 新規項目作成画面
     */
    public function create(Request $request, $id)
    {
        return view('item.create', ['id' => $id]); 
    }

    /**
     * 項目追加処理
     */
    public function store(Request $request)
    {
        return back()->with(['success' => __('messages.S001', ['name' => '項目'])]);
    }

    /**
     * 項目編集画面
     */
    public function edit($id)
    {
        return view('item.edit', ['id' => $id]);
    }

    /**
     * 項目更新
     */
    public function update(Request $request, $id)
    {
        return back()->with(['success' => __('messages.S002', ['name' => '項目'])]);
    }

    /**
     * 指定の項目を削除する
     */
    public function destroy($id)
    {
        $item = CollectionItem::findOrFail($id);
        if (!empty($item)) {
            DB::beginTransaction();
            try {
                // 項目詳細も削除
                CollectionItemLang::where('item_id', '=', $id)->delete();
                $item->delete();
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                report($e);
                return back()->with(['failed' => __('messages.error_occurred')]);
            }
        }
        return back()->with(['success' => __('messages.S003', ['name' => '項目'])]);
    }
}
