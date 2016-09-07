<?php
	//啟用 session，若要使用 session 一定要在網頁的最上方，使用 session_start(); 啟用它
    session_start();
	
	//使用session變數名稱為 myName
	echo '$_SESSION["myName"] ' . $_SESSION["myName"];
	//session_destroy();刪除session檔案，下次存取才會發生效果
	//session_unset();清除session陣列內容
?>