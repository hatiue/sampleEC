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
	<div>
		<h2>注文が完了しました。</h2>
	</div>
	<div>
		<h2>注文内容</h2>
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
					<tr>
						<td>{{ $item["name"] }}</td>
						<td>{{ $item["price"] }}円</td>
						<td>{{ $item["quantity"] }}個</td>
						<td>{{ $subtotal }}円</td>
					</tr>
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

	<button><a style="text-decoration: none;" href="{{ route('shopping') }}">一覧に戻る</a></button>
</body>
</html>
