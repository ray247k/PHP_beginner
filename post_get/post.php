<?php
	//取得狀況
    $status = $_POST['status'];
	
	//取得主旨
    $title = $_POST['title'];
	
	//取得信箱
    $email = $_POST['email'];
	
	//取得暱稱
    $neme = $_POST['neme'];
	
	//取得性別
    $gender = $_POST['gender'];
	//取得內文
    $content = $_POST['content'];
?>
<h2>以下為傳過來的資料</h2>

<p>狀況：<?php echo $status;?></p>
<p>主旨：<?php echo $title;?></p>
<p>信箱：<?php echo $email;?></p>
<p>暱稱：<?php echo $neme;?></p>
<p>性別：<?php echo $gender;?></p>
<p>內文：<?php echo $content;?></p>