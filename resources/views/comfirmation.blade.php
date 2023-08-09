<!doctype html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sampleEC</title>

	<!-- Bootstrap core CSS -->
	<link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	@if(! empty($error))
		<p style="color: red;">{{ $error }}</p>
		<span>もしかして：</span>
		<ul>
			<li>ログインしていない</li>
			<li>セッション時間切れ？</li>
			<li>※末尾「？」は未確認だがありそうなもの</li>
		</ul>
	@endif
	<div>
		<h2>カートの内容を確認してください</h2>
		<p>※注文の確定にはログインが必要です</p>
	</div>
	<p>確定ボタンを押したらテーブルに保存される</p>
		<div>
			<h2>カートの中身</h2>
			<table>
				<thead>
					<tr>
						<th>商品名</th>
						<th>価格</th>
						<th>個数</th>
						<th>小計</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$total = 0;
						$items = 0;
					?>
					@foreach($cart as $item)
						<?php
							$subtotal = $item["price"] * $item["quantity"];
							$total += $subtotal;
							$items += $item["quantity"]
						?>
						@if($item["quantity"] > 0)
							<tr>
								<td>{{ $item["name"] }}</td>
								<td>{{ $item["price"] }}円</td>
								<td>{{ $item["quantity"] }}個</td>
								<td>{{ $subtotal }}円</td>
							</tr>
						@endif
					@endforeach
				</tbody>
			</table>
		</div>
		<div>
			<h4>総数</h4>
			<p>{{ $items }}個</p>
			<h4>総計</h4>
			<p>{{ $total }}円</p>
		</div>

	<button><a style="text-decoration: none;" href="{{ route('shopping') }}">カートに戻る</a></button>
	<form id="purchase" action="{{ route('purchase') }}" method="post">
	@csrf
		<button id="purchase" type="submit">注文を確定する</button>
	</form>
</body>
</html>
