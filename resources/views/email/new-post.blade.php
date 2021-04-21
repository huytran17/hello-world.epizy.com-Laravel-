<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bài viết mới nhất</title>
</head>
<body>
	<div>
		<p>Thông báo từ {{ config('app.name', 'hello-world') }}</p>
		<p>{{ $link }}</p>
	</div>
</body>
</html>