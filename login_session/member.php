<?php 
	session_start(); //啟動 session
?>
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
		p.danger{
			color:red;
			text-align:center;
		}
	</style>
	<body>
		<?php
			//使用 isset()方法，判別變數是否存在，&&是否為已經登入狀態
		if(isset($_SESSION['is_login']) && $_SESSION['is_login'] == TRUE):
		
			//若已經是登入狀態使用php header 來轉址到後台
			header('Location: backend.php');
		?>
		<?php else:?><!--若沒登入，就可以看到登入表單，或是登入失敗訊息-->
		<form method="post" action="check_login.php">
			<?php
				//有訊息
				if(isset($_SESSION['msg']))
				{
					//就印出
					echo "<p class='danger'>{$_SESSION['msg']}</p>";
				}
			?>
			<div>
			帳號：<input type="text" name="username">
			</div>
			<div>
			密碼：<input type="password" name="password">
			</div>
			<button type="submit">登入</button>
		</form>
		<?php endif;?>
	</body>
</html>