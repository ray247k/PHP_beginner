<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    
    $filename = "grade.txt";
    $data = "王小七 85,75,68\r\n";//檔案內\r\n 是換行
    $dataHeader = "姓名, 國文, 英文, 數學\r\n";
    $fopStatus = fopen($filename,"a+");//用a+的方法開啟檔案$filename
    
    if ($fopStatus == false){ //開啟失敗就印出錯誤，並停止程式
        echo "開檔失敗";
        exit;
    }
    //如果檔案大小為0，表示原本沒資料，就加入標頭 
    if(filesize($filename)==0){
        $data = $dataHeader;
    }
    fwrite($fopStatus,$data);//檔案寫入
    fseek($fopStatus ,0);//要來讀取檔案，從0位元開始
    $word = fread($fopStatus , filesize($filename));
    $neword = str_replace("\r\n","<br>",$word);
    echo "寫入檔案的內容為<hr>".$neword;
    
    fclose($fopStatus);//關閉檔案
    
    ?>
</body>
</html>            