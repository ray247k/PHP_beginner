<?php 
$p = 'index'; //預設頁面為index
//開始判斷內文區塊
if(isset($_GET['p']))//使用get方法取得導覽列回傳的變數p值(line34~36)
{
	$p = $_GET['p'];//把取得的p值定義給$p
}
//結束判斷內文區塊
//開始判斷網頁title
switch ($p){//判斷p是什麼狀況
	case 'index';
		$site_title='首頁';//p為index則是在首頁(line34)
		break;
	case 'video';
		$site_title='影片';//p為video則是在影片頁面(line35)
		break;
	case 'contact';
		$site_title='聯絡我們';//p為contact則是在聯絡我們頁面(line36)
		break;
	default;
		$site_title='頁面不存在';//p為其他值為阻擋使用者猜測後台網址
	break;
}
//結束判斷網頁title
?>