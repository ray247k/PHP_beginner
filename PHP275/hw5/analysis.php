<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
	$filename = "grade.txt";
    $name = $_POST['name'];
    $id = $_POST['id'];
    $mail = $_POST['mail'];
    $chi = $_POST['chi'];
    $eng = $_POST['eng'];
    $math = $_POST['math'];
    $phy = $_POST['phy'];
    $che = $_POST['che'];
	$total = $chi+$eng+$math+$phy+$che;
	$avg = $total/5;
	$data = $name."-".$id."-".$mail."-".$chi."-".$eng."-".$math."-".$phy."-".$che."-".$total."-".$avg."\r\n";
	$dataHeader ="姓名-學號-電子郵件-國文-英文-數學-物理-化學\r\n";
	
    file_put_contents($filename,$data,FILE_APPEND);

	//儲存的方式為一行一行，故用$content = file($filename);將每一行設成一個index
	if(file_exists($filename)){
		$content = file($filename);
	}
	echo "<table border='1'>";
	echo "<tr><td>姓名</td><td>學號</td><td>email</td><td>國文</td><td>英文</td><td>數學</td><td>物理</td><td>化學</td><td>總分</td><td>平均分數</td></tr>";
	//印出檔案
	foreach($content as $num => $data)
	{
		//分割個別欄位
		$str = explode('-',$data);
		echo "<tr>";
			for($i=0;$i<count($str);$i++){
				echo "<td>".$str[$i]."</td>";
			} 
		echo "</tr>";
	}
	echo "</table>";

    ?>
</body>
</html>