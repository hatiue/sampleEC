<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToCartRequest;
use App\Services\GoodService;

class ToCartController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // 「カートに入れる」ボタンの挙動
    public function __invoke(ToCartRequest $request, GoodService $service)
    {
        $goodscode = $request->goodscode();
        $name = $service->searchGoodNameInTestcart($goodscode);
        $price = $request->price();
        $quantity = $request->quantity();
        // セッション情報を書き込む
        $request->session()->put($goodscode, ['price' => $price, 'quantity' => $quantity]); // 同じキーなら上書きしてくれる
        $cart = $service->totalCart(session()->all());
        $goods = $service->getAllGoods();
        return view('shopping', ['goods' => $goods, 'cart' => $cart])->with('toCart', "{$name}を{$quantity}つカートに追加しました！");
    }
}
