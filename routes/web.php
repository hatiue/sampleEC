<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HandyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', function () {
    return view('test');
});

Route::get('/sampleEC', \App\Http\Controllers\IndexController::class)
    ->name('home');
Route::post('/sampleEC', \App\Http\Controllers\AddGoodsController::class)
    ->name('add'); // 商品追加 下記cartと同じく/addを削除
Route::get('/sampleEC/shopping', \App\Http\Controllers\ShoppingController::class)
    ->name('shopping'); // 商品ページ
Route::post('/sampleEC/shopping', \App\Http\Controllers\ToCartController::class)
    ->name('cart'); // カートに追加 動作に独自urlを振るとログイン後のリダイレクトでメソッド由来のエラーになるため、商品ページと共通に
Route::get('/sampleEC/shopping/sessionReset', [HandyController::class, 'sessionReset'])
    ->name('reset'); // セッション削除

Route::post('/sampleEC/shopping/confirmation', \App\Http\Controllers\ConfirmationController::class)
    ->middleware('auth')
    ->name('confirmation'); // カートの中身確認
Route::post('/sampleEC/shopping/purchase', \App\Http\Controllers\PurchaseController::class)
    ->middleware('auth')
    ->name('purchase'); // 購入確定

Route::get('/sampleEC/test', function () {
    return view('item');
})->name('test'); // ビューファイルいじる用

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
