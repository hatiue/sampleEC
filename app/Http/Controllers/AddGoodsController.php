<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGoodsRequest;
use App\Models\Good;


class AddGoodsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // 商品追加
    public function __invoke(AddGoodsRequest $request)
    {
        $item = new Good;
        $item->code = $request->code();
        $item->name = $request->name();
        $item->price = $request->price();
        $item->description = $request->description();
        $item->save();

        return redirect()->route('home');
    }
}
