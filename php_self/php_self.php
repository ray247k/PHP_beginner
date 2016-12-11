<?php
echo $_SERVER['PHP_SELF'];//找出主目錄下的檔案位置
?>

<!--不跳頁，在本頁取得自己輸入的資料-->
<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
<input type = 'test' name = 'test' value = ''>
<input type = 'submit' name = 'submit' value = 'send'>
</form>
<?php
@$str = $_POST['test'];//使用@，如果初始值為空，不回報錯誤
echo $str;
?>