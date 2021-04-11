<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Xác thực địa chỉ e-mail</title>
</head>
<body>
	<div>
		<a href="{{ route('auth.VerifyEmail', ['id' => auth()->id()]) }}">Verify</a>
	</div>
</body>
</html>