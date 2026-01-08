<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/**
 * Customize email cuz need specific email address
 */
Route::post('/password/email', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    // Original code
    // return $status === Password::RESET_LINK_SENT
    //     ? back()->with(['status' => __($status)])
    //     : back()->withErrors(['email' => __($status)]);

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status), 'email' => $request->input('email')])
        : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // 資料
    Route::get('/collection/search', [App\Http\Controllers\CollectionController::class, 'search'])->name('collection.search');  // 資料検索ページ
    Route::post('/collection/list', [App\Http\Controllers\CollectionController::class, 'list'])->name('collection.list');  // 資料一覧ページ
    Route::get('/collection/create', [App\Http\Controllers\CollectionController::class, 'create'])->name('collection.create');  // 新規資料登録ページ
    Route::post('/collection', [App\Http\Controllers\CollectionController::class, 'store'])->name('collection.store');  // 資料保存
    Route::get('/collection/{id}/edit', [App\Http\Controllers\CollectionController::class, 'edit'])->name('collection.edit');  // 資料変更ページ
    Route::put('/collection/{id}', [App\Http\Controllers\CollectionController::class, 'update'])->name('collection.update');  // 資料更新
    Route::put('/collection/{id}/status', [App\Http\Controllers\CollectionController::class, 'status'])->name('collection.status');  // 公開状態更新
    Route::post('/collection/publish', [App\Http\Controllers\CollectionController::class, 'publish'])->name('collection.publish');  // 公開状態一括更新
    Route::get('/collection/{id}/preview', [App\Http\Controllers\CollectionController::class, 'preview'])->name('collection.preview');  // プレビューページ
    Route::delete('/collection/{id}', [App\Http\Controllers\CollectionController::class, 'destroy'])->name('collection.destroy');  // 資料削除
    Route::post('/collection/delete', [App\Http\Controllers\CollectionController::class, 'delete'])->name('collection.delete');  // 資料一括削除

    // 分類
    Route::get('/genre', [App\Http\Controllers\GenreController::class, 'index'])->name('genre.index');
    Route::get('/genre/{id}/create', [App\Http\Controllers\GenreController::class, 'create'])->name('genre.create');
    Route::post('/genre', [App\Http\Controllers\GenreController::class, 'store'])->name('genre.store');
    Route::get('/genre/{id}/edit', [App\Http\Controllers\GenreController::class, 'edit'])->name('genre.edit');
    Route::put('/genre/{id}', [App\Http\Controllers\GenreController::class, 'update'])->name('genre.update');
    Route::get('/genre/{id}/setting', [App\Http\Controllers\GenreController::class, 'setting'])->name('genre.setting');
    Route::delete('/genre/{id}', [App\Http\Controllers\GenreController::class, 'destroy'])->name('genre.destroy');

    // 項目
    Route::get('/items', [App\Http\Controllers\ItemsController::class, 'index'])->name('items.index');
    Route::get('/items/{id}/create', [App\Http\Controllers\ItemsController::class, 'create'])->name('items.create');
    Route::post('/items', [App\Http\Controllers\ItemsController::class, 'store'])->name('items.store');
    Route::get('/items/{id}/edit', [App\Http\Controllers\ItemsController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [App\Http\Controllers\ItemsController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [App\Http\Controllers\ItemsController::class, 'destroy'])->name('items.destroy');

    // ユーザー
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
});
