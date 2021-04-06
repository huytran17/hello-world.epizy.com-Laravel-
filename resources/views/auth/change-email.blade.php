<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thay đổi địa chỉ e-mail</title>
</head>
<body>
	<div>
		<a href="{{ route('auth.changeEmail', ['_token' => $token]) }}">Change</a>
	</div>
</body>
</html>