<?php include 'include.php'
//include方法呼叫外部檔案執行
?> 
<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php echo $site_title;?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="favicon.ico">
		<!-- html5 reset -->
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class='menu'>
			<nav>
				<ul><!--get方法傳送一個p值，在get方法透過網址傳送資料的時候"?"後才是變數的開始-->
					<li><a href='?p=index'>首頁</a></li>
					<li><a href='?p=video'>影片</a></li>
					<li><a href='?p=contact'>聯絡我們</a></li>
				</ul>
			</nav>
		</div>
<div class='main'>
<?php if($p == "index"):?><!--if 導覽列回傳的p == index，則顯示下方內容-->
	<h1 class="welcome">說明</h1>
	<div class='intro'>
		<p>
			此練習為使用php動態判斷頁面顯示內容<br>
			原本用jquery動作來切換一頁式網頁欲顯示之內容的作法，也可以用php的get方法做動態的判斷<br>
			甚至可以使用if判斷來阻止使用者直接在網址列更改變數來try後臺網址，或是進行其他入侵行為。<br>
			也可以藉由變數來動態更改網站title <br>
			還有php中include方法的練習。
		</p>
		<p>
			詳情可至影面頁面觀看相關教學。
		</p>
	</div>
<?php elseif($p=="video"):?><!--elseif 導覽列回傳的p == video，則顯示下方內容-->
	<div class='game_video'>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/suRB79oOB6w?list=PLwIFDX7xv6k0DFTPpu1wTr8cuc2VC91bW" frameborder="0" allowfullscreen></iframe>
	</div>
<?php elseif($p=="contact"):?><!--elseif 導覽列回傳的p == contact，則顯示下方內容-->
	<div class='contact_form'>
		<form method="post" action="form.php">
			<p>
				<label for="subject">主旨：</label><input type="text" id="subject" name="subject" title="主旨"/>
			</p>
			<p>
				<label for="contact">內文：</label><textarea id="contact" name='contact'></textarea>
			</p>
			<p>
				<button type="submit">送出</button>
			</p>
		</form>
	</div>
<?php else:?><!--else若是使用者直接操作網址列變數，而變數不符合定義，則顯示下方內容-->
<h1>警告，頁面不存在，請正確操作網頁</h1>
<?php endif;?>
	
	</body>
</html>
