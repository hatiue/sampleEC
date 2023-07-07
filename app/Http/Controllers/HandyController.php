<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoodService;

// 機能確認用の簡単なメソッドを入れる
class HandyController extends Controller
{
    // セッション削除
    public function sessionReset(Request $request)
    {
        $request->session()->flush();
        // return back()だと最後に追加したものが復活してしまう
        return redirect()->route('shopping');
    }
}
