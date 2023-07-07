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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sampleEC', \App\Http\Controllers\IndexController::class)
    ->name('home');
Route::post('/sampleEC/add', \App\Http\Controllers\AddGoodsController::class)
    ->name('add'); // 商品追加
Route::get('/sampleEC/shopping', \App\Http\Controllers\ShoppingController::class)
    ->name('shopping'); // 商品ページ
Route::post('/sampleEC/shopping/cart', \App\Http\Controllers\ToCartController::class)
    ->name('cart'); // カートに追加
Route::post('/sampleEC/shopping/confirmation', \App\Http\Controllers\ConfirmationController::class)
    ->name('confirmation'); // カートの中身確認
Route::post('/sampleEC/shopping/purchase', \App\Http\Controllers\PurchaseController::class)
    ->name('purchase'); // 購入確定
Route::get('/sampleEC/shopping/sessionReset', [HandyController::class, 'sessionReset'])
    ->name('reset'); // セッション削除

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
