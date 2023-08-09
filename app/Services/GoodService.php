<?php

namespace App\Services;

use App\Models\Good;
use App\Models\Testcart;

class GoodService
{
    public function getAllGoods()
    {
        return Good::all(); 
    }

    public function getAllTestcart()
    { // このメソッドはどこからも参照されていない
        return Testcart::all(); 
    }

    // カートに入れた商品の名前を1件取得する
    public function searchGoodNameInTestcart($code)
    {
        $row = Good::select('name')->where('code', $code)->firstOrFail(); // 商品コードはprimaryキー
        $array = $row->toArray();
        return $array["name"];
    }

    // カートに入れた商品の名前・数量・価格を返す
    public function totalCart($sessionArray)
    {
        // 全ての商品コードを取得する
        $allcodes = Good::select('code')->get();
        $codesArray = $allcodes->toArray();
        // 取得した全ての商品コードをin_array()で扱いやすい形の配列にする
        $codes = [];
        foreach($codesArray as $array) {
            foreach($array as $key => $value) {
                $codes[] = $value;
            }
        }
        
        // ビューファイルで扱うための配列を作成する
        $cart = [];
        foreach($sessionArray as $key => $value) {
            if(in_array($key, $codes)) {
                $name = $this->searchGoodNameInTestcart($key);
                $cart[$key] = ["name" => $name, "price" => $value["price"], "quantity" => $value["quantity"]];
            }
        }
        ksort($cart);
        return $cart;
    }

    public function orderHistory($userId)
    {
        // ユーザーの注文一覧を取得する
        // タイムスタンプを表示することで、一度の注文かどうか判別
        $orders = Testcart::where('user_id', $userId)->get();
        return $orders;
        // タイムスタンプを基準に、分割して表示させたい
    }
}
