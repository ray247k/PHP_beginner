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
	//一行寫入檔案
    file_put_contents($filename,$data,FILE_APPEND);

	//儲存的方式為一行一行，故用$content = file($filename);將每一行設成一個index
	if(file_exists($filename)){
		$content = file($filename);
	}
	echo "<table border='1'>";
	echo "<tr><td>排名</td><td>姓名</td><td>學號</td><td>email</td><td>國文</td><td>英文</td><td>數學</td><td>物理</td><td>化學</td><td>總分</td><td>平均分數</td></tr>";
	//印出檔案
	foreach($content as $num => $data)
	{
		//分割個別欄位儲存為$str陣列
		$str = explode('-',$data);
		echo "<tr><td>".($num+1)."</td>";
			for($i=0;$i<count($str);$i++){
				//判斷及不及格
				if(is_numeric($str[$i])&& $str[$i]<60 ){
					$detail = "<td>"."<font color=\"red\">".$str[$i]."</font>"."</td>";	
				}else{
					$detail = "<td>".$str[$i]."</td>";
				}
				echo $detail;
			} 
		echo "</tr>";
	}
	echo "</table>";

    ?>
</body>
</html>