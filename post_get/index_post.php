<!DOCTYPE html>
<html lang="zh-TW">
	<head>
		<meta charset="utf-8" />
		<title>傳遞資料</title>
		
	</head>
	<body>
		<form method="post" action="post.php">
			<div>狀況：
				<select name="status">
					<option value="最新消息">速件</option>
					<option value="個人作品">普通</option>
				</select>
			</div>
			<div>主旨：<input type="text" name="title">
			<div>您的信箱：
				<label><input type="email" name="email"></label>
			</div>
			<div>您的暱稱：<input type="text" name="neme"></div>
			<dvi>您的性別<label><input type="radio" name="gender" value="男性">男性</label>
				 <label><input type="radio" name="gender" value="女性">女性</label>
			</dvi>
			<div>內文：<textarea name="content"cols="30" rows="10"></textarea></div>
			<button type="submit">送出</button>
		</form>
	</body>
</html>