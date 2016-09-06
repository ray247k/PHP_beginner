<?php
	//假設的有效會員帳號
	$db_user = "admin";
	$db_password = 'admin1234';

	//取得傳過來的帳號密碼
    $username = $_POST['username'];
	$password = $_POST['password'];
	
	
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<title>會員登入</title>
		
	</head>
	<style>div.result {text-align:center;}</style>
	
	<body>
		<div class="result">
		<?php
		if($username == $db_user && $password == $db_password)
		{
			//如果帳號一樣，以及密碼一樣，那就代表正確，所以顯示登入成功
			echo "<h2>登入成功</h2>";
			echo "歡迎登入！";
		}
		else 
		{
			//要不然就是登入失敗
			echo "<h2>登入失敗，請重新登入</h2><a href='login.php'>重新登入</a>";
		}
		?>
		</div>
	</body>
</html>