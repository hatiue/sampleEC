<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\GoodService;
use App\Models\Testcart;
use Exception;

class PurchaseController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, GoodService $service)
    {
        // 購入確定
        $cart = $service->totalCart(session()->all());
        // dd($cart);
        // cartの中身をテーブルに保存する 処理をサービスコンテナに移動させる？
        DB::beginTransaction();
        try{
            foreach($cart as $key => $value){
                    $table = new Testcart;
                    $table->goodscode = $key;
                    $table->price = $cart[$key]['price'];
                    $table->quantity = $cart[$key]['quantity'];
                    $table->user_id = auth()->id();
                    $table->save();
            }
            DB::commit();
            // テーブルに保存が完了したらセッションを削除する
            $request->session()->flush();
        } catch(Exception $e) { // Illuminate\Database\QueryException
            //dd($e);
            DB::rollback();
            return view('comfirmation')->with('cart', $cart)->with('error', "注文処理にエラーが発生しました。");
        }

        // テーブルに保存したものをビューに渡す
        // サービスコンテナにて処理作成中
        $array = $service->orderHistory(auth()->id());
        return "ok"; //view('confirmedOrder');
    }
}
