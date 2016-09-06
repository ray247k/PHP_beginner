<?php
	//取得主旨
    $subject = $_POST['subject'];
	
	//取得內容
    $contact = $_POST['contact'];
?>
<h2>已經收到您的回覆，謝謝</h2>

<p>主旨：<?php echo $subject;?></p>
<p>內文：<?php echo $contact;?></p>