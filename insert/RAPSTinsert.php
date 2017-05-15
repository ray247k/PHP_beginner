<?php
header("Content-Type:text/html; charset=utf-8");
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '33064598';
$dbname = 'rayin';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);//連接資料庫
mysqli_query($conn,"SET NAMES 'utf8'");//設定語系
if ( !$conn ) { die ("無連連線資料庫"); }


$BHNO_array = array("0","1","2","3","4","5","6","7","8","9","A","K","L");
$path = "RAPST/RAPST.";

$del = "DELETE FROM `RAPST` WHERE 1";
mysqli_query($conn,$del)or die ("can not delete".mysql_error());

foreach ($BHNO_array as $BHNO) {
	$BHNO = $path."BH".$BHNO;
	$myfile = fopen($BHNO, "r") or die("Unable to open file!");
	$data = file_get_contents($BHNO);
	$data=iconv("big5","UTF-8",$data); 
	$array = explode("\n", $data);
		foreach ($array as $record) {
			$record = trim($record);
			
			$UD = substr($record,0,1);
			$APCODE = substr($record,1,1);
			$IDNO = substr($record,2,10);
			$STOCK = substr($record,12,6);
			$BDATE = substr($record,18,8);
			$BHNO = substr($record,26,4);
			$CSEQ = substr($record,30,6);
			$CKNO = substr($record,36,1);
			$ADATE = substr($record,37,8);
			$SQNO = substr($record,45,6);
			$APSTUS = substr($record,51,1);
			$EWMAG = substr($record,52,16);
			$APPCODE = substr($record,68,1);
			$APSCODE = substr($record,69,1);
			$TRDATE = substr($record,70,8);
			//echo $UD."<br>".$APCODE."<br>".$IDNO."<br>".$STOCK."<br>".$BDATE."<br>".$BHNO."<br>".$CSEQ."<br>".$CKNO."<br>".$ADATE."<br>".$SQNO."<br>".$APSTUS."<br>".$EWMAG."<br>".$APPCODE."<br>".$APSCODE."<br>".$TRDATE."<br>";
			$sql = "INSERT INTO `RAPST` (UD,APCODE,IDNO,STOCK,BDATE,BHNO,CSEQ,CKNO,ADATE,SQNO,APSTUS,EWMAG,APPCODE,APSCODE,TRDATE)  VALUES ('$UD','$APCODE','$IDNO','$STOCK','$BDATE','$BHNO','$CSEQ','$CKNO','$ADATE','$SQNO','$APSTUS','$EWMAG','$APPCODE','$APSCODE','$TRDATE')";
			echo $sql."<hr>"; 
			mysqli_query($conn,$sql)or die ("can not insert".mysql_error());
		}
	//print_r($array);

}
// $mystr = "U3P2200695552884  201704255260001246420170427000313Y                  20170502";
// echo substr($mystr,0,1)."<br>";
// echo substr($mystr,1,1)."<br>";
// echo substr($mystr,2,10)."<br>";
// echo substr($mystr,12,6)."<br>";
// echo substr($mystr,18,8)."<br>";
// echo substr($mystr,26,4)."<br>";
// echo substr($mystr,30,6)."<br>";
// echo substr($mystr,36,1)."<br>";
// echo substr($mystr,37,8)."<br>";
// echo substr($mystr,45,6)."<br>";
// echo substr($mystr,51,1)."<br>";
// echo substr($mystr,52,16)."<br>";
// echo substr($mystr,68,1)."<br>";
// echo substr($mystr,69,1)."<br>";
// echo substr($mystr,70,8)."<br>";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>RAPSTinsert</title>
	<link rel="stylesheet" href="">
</head>
<body>
</body>
</html>