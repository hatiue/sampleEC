<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoodService;

class ConfirmationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // 購入確認ページ
    public function __invoke(GoodService $service)
    {
        // カートの中身を表示して、確定かどうか確認する
        $cart = $service->totalCart(session()->all());
        return view('comfirmation')->with('cart', $cart);
    }
}
