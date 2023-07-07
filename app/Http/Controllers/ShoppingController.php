<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoodService;

class ShoppingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // 買い物メインページ
    public function __invoke(Request $request, GoodService $service)
    {
        $goods = $service->getAllGoods();
        $cart = $service->totalCart(session()->all());
        return view('shopping')->with('goods', $goods)->with('cart', $cart);
    }
}
