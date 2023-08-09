<?php
// phpinfo();
// ?XDEBUG_SESSION_START=session_name // デバッグ時URLの末尾につけて読み込み
function test(array $array) // インターネットの記事参照
{
    $array = array_unique($array);
    $results = [[]]; // $item単体の組み合わせを作るために、初期値の空配列が必要
    
    foreach($array as $item) {
        // ループの度に、現時点の$resultsの各要素と$itemを結合した配列を$resultsに追加していく
        foreach($results as $result) {
            $results[] = [$item, ...$result]; // array_merge()
        }
    }
    array_shift($results);
    return array_values($results);
}

$arr = ["a", "b", "c", "d"];
$ans = test($arr);
echo "a";
?>