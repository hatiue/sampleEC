<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoodService;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    // 商品追加用ページ
    public function __invoke(Request $request, GoodService $service)
    {
        $goods = $service->getAllGoods();
        return view('home')->with('goods', $goods);
    }
}
