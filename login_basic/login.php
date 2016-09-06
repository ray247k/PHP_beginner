<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<title>會員登入</title>
		
	</head>
	<style>
		form {
			border:#aaa solid 1px;
			margin:20px auto;
			padding:30px;
			width:300px;
		}
	</style>
	<body><!--用post方法把輸入的帳號密碼送到do_login.php做判斷-->
		<form method="post" action="do_login.php">
			<div>
			帳號：<input type="text" name="username">
			</div>
			<div>
			密碼：<input type="password" name="password">
			</div>
			<button type="submit">登入</button>
		</form>
	</body>
</html>