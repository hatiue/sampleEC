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
		<h1>商品追加ページ</h1>
		<form id="upload" action="{{ route('add') }}" method="post" enctype="multipart/form-data">
		@csrf
			商品コード：<input type="text" name="code"><span>F01のような形</span>
				@error('code')
				<p style="color: red;">{{ $message }}</p>
				@enderror
				<br>
			商品名：<input type="text" name="name">
				@error('name')
				<p style="color: red;">{{ $message }}</p>
				@enderror
				<br>
			価格：<input type="number" name="price">円
				@error('price')
				<p style="color: red;">{{ $message }}</p>
				@enderror
				<br>
			<!-- 商品画像：<input type="file" name="image"><br> -->
			説明：<textarea name="description"></textarea><br>
			<button id="upload" type="submit">登録</button>
		</form>
	</div>
	<div>
		<button><a style="text-decoration: none;" href="{{ route('shopping') }}">買い物ページへ</a></button>
	</div>
	<div>
		<h2>商品一覧</h2>
		<table>
			<thead>
				<tr>
					<th>商品コード</th>
					<th>商品名</th>
					<th>価格</th>
					<th>説明</th>
				</tr>
			</thead>
			<tbody>
				@foreach($goods as $good)
					<tr>
						<td>{{ $good->code }}</td>
						<td>{{ $good->name }}</td>
						<td>{{ $good->price }}</td>
						<td>{{ $good->description }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</body>
</html>
