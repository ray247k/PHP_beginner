<?php
header("Content-Type:text/html; charset=utf-8");
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '33064598';
$dbname = 'rayin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);//連接資料庫
mysqli_query($conn,"SET NAMES 'utf8'");//設定語系
if ( !$conn ) { die ("無連連線資料庫"); }
//刪除舊有資料庫檔案
$del = "DELETE FROM `RSTAN` WHERE 1";
mysqli_query($conn,$del)or die ("can not delete".mysql_error());
	$myfile = fopen("RSTAN.TXT", "r") or die("Unable to open file!");
	$data = file_get_contents("RSTAN.TXT");
	$array = explode("\n", $data);
	//print_r($array);
		foreach ($array as $record) {
			$record = trim($record);
			$UD = substr($record,0,1);
			$stock = substr($record,1,6);
			$Sname = substr($record,7,8);
			$Sname=iconv("big5","UTF-8",$Sname); 
			$Market = substr($record,15,1);
			$Bdate = substr($record,16,8);
			$E3date = substr($record,24,8);
			$Price = substr($record,32,11);
			$Qty = substr($record,43,6);
			$Brkno = substr($record,49,4);
			$Lname = substr($record,53,12);
			$Lname=iconv("big5","UTF-8",$Lname); 
			$E4date = substr($record,65,8);
			$E5date = substr($record,73,8);
			$E13date = substr($record,81,8);
			$Cdate = substr($record,89,8);
			$Isuqty = substr($record,97,12);
			$Trdate = substr($record,109,8);
			//echo $UD."<br>".$stock."<br>".$Sname."<br>".$Market."<br>".$Bdate."<br>".$E3date."<br>".$Price."<br>".$Qty."<br>".$Brkno."<br>".$Lname."<br>".$E4date."<br>".$E5date."<br>".$E13date."<br>".$Cdate."<br>".$Isuqty."<br>".$Trdate."<br><hr>";

		 	$sql = "INSERT INTO `RSTAN` (UD,stock,Sname,Market,Bdate,E3date,Price,Qty,Brkno,Lname,E4date,E5date,E13date,Cdate,Isuqty,Trdate)  VALUES ('$UD','$stock','$Sname','$Market','$Bdate','$E3date','$Price','$Qty','$Brkno','$Lname','$E4date','$E5date','$E13date','$Cdate','$Isuqty','$Trdate')";
		 	echo $sql."<hr>"; //測試SQL
		 	mysqli_query($conn,$sql)or die ("can not insert".mysql_error());//寫入SQL
	}
	//print_r($array);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RSTANinsert</title>
	<link rel="stylesheet" href="">
</head>
<body>
</body>
</html>