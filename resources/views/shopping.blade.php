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
	<p>セッションについて記事を参考に試す</p>
	<div>
		<h2>商品一覧</h2>
		<table>
			<thead>
				<tr>
					<th>商品コード</th>
					<th>商品名</th>
					<th>価格</th>
					<th>説明</th>
					<th>
						@error('quantity')
							<p style="color: red;">{{ $message }}</p>
						@enderror
					</th>
					<th></th>
				</tr>
			</thead>
			@if (session('toCart'))
				<p style="color: green;">{{ session('toCart') }}</p>
			@endif
			<tbody>
				<?php //$i = 0 ?>
				@foreach($goods as $good)
					<tr>
						<td>{{ $good->code }}</td>
						<td>{{ $good->name }}</td>
						<td>{{ $good->price }}円</td>
						<td>{{ $good->description }}</td>
						<form id="{{ $good->code }}" action="{{ route('cart') }}" method="post">
						@csrf
							<td>
								<input id="{{ $good->code }}" type="hidden" name="goodscode" value="{{ $good->code }}">
								<input id="{{ $good->code }}" type="hidden" name="price" value="{{ $good->price }}">
								<input id="{{ $good->code }}" type="number" name="quantity" value="{{ $cart[$good->code]['quantity'] ?? 0 }}">個
							</td>
							<td>
								<button id="{{ $good->code }}" type="submit">カートに入れる</button>
							</td>
						</form>
					</tr>
					<?php //$i++ ?>
				@endforeach
			</tbody>
		</table>
	</div>
	@if(! empty($cart))
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
		<div>
			<button><a style="text-decoration: none;" href="{{ route('reset') }}">セッション削除</a></button>
		</div>
	@endif

	<button><a style="text-decoration: none;" href="{{ route('home') }}">戻る</a></button>
	@if(! empty($cart))
		<form id="confirmation" action="{{ route('confirmation') }}" method="post">
		@csrf
			<button id="confirmation" type="submit">購入する</button>
		</form>
	@endif
</body>
</html>
