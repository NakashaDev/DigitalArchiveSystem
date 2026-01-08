<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Enums\LangCode;
use App\Models\CollectionGenre;
use App\Models\CollectionGenreLang;

class CollectionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the collection search.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search()
    {
        $langs = CollectionGenreLang::where('lang_code', LangCode::JAPANESE);
        $genres = CollectionGenre::joinSub($langs, 'genre_lang', function($join) {
                    $join->on('collection_genres.collection_genre_id', '=', 'genre_lang.collection_genre_id');
                })
                ->select('collection_genres.*', 'genre_lang.genre_name', 'genre_lang.genre_name_v')
                ->orderBy('genre_order', 'ASC');

        $genres = $genres->get();

        return view('collection.search', [
            'genres' => $genres
        ]);
    }

    /**
     * Show the collection list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function list(Request $request)
    {
        return view('collection.list');
    }

    /**
     * Show the collection create.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('collection.create');
    }

    /**
     * Create the new collection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        return view('collection.store');
    }

    /**
     * Show the collection edit.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        return view('collection.edit');
    }

    /**
     * Update the old collection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        return view('collection.update');
    }

    /**
     * Update the collection status.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function status(Request $request, $id)
    {
        return view('collection.status');
    }

    /**
     * Update the multi-collections status.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function publish(Request $request)
    {
        return view('collection.publish');
    }

    /**
     * Preview the collection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function preview(Request $request, $id)
    {
        return view('collection.preview');
    }

    /**
     * Delete the one collection.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function destroy(Request $request, $id)
    {
        return view('collection.destroy');
    }

    /**
     * Delete the multi-collections.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Request $request)
    {
        return view('collection.delete');
    }
}
