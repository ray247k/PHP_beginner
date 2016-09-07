<?php
	session_start();
	
?>
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<title>後台管理</title>
		
	</head>
	<style>
		div.result {
			text-align:center;
		}
	</style>
	<body>
		<?php 
			//如果有 $_SESSION['is_login'] 這變數，以及 $_SESSION['is_login'] 為 true，就是已經登入了
			if(isset($_SESSION['is_login']) && $_SESSION['is_login']):
		?>
		<div class="result">
			<h2>你正在後台</h2>
			<p>歡迎回來</p>
			<p><!--按下把我登出按鈕轉址到logout.php執行清出session-->
				<a href='logout.php'>把我登出</a>
			</p>
		</div>
		<?php else:?>
			<?php 
			//沒有正確登入，例如直接使用網址進行破解
			//使用php header 來轉址
			header('Location: member.php');
			?>
		<?php endif;?>
	</body>
</html>