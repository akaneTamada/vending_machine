<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//商品一覧画面表示　コーチと作成
Route::get('/product_list', [App\Http\Controllers\ProductController::class, 'index'])->name('product_list');

//商品一覧画面　検索フォーム
Route::get('/product_search', [App\Http\Controllers\ProductController::class, 'search'])->name('search');


//商品新規登録　画面表示
Route::get('/product_create', [App\Http\Controllers\ProductController::class, 'create'])->name('product_create');
//商品新規登録　商品情報を登録するルート
Route::post('/product_store', [App\Http\Controllers\ProductController::class, 'store'])->name('product_store');



//商品一覧→商品詳細情報画面　コーチと作成
Route::get('/product_detail/{id}', [App\Http\Controllers\ProductController::class, 'productDetail'])->name('product_detail');

//商品一覧→商品情報編集画面
Route::get('/product_edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product_edit');
//商品編集画面の更新処理
Route::post('/product_update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product_update');




//削除ボタン
Route::post('/delete', [App\Http\Controllers\ProductController::class, 'delete'])->name('product_delete');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//商品一覧画面表示のルート
