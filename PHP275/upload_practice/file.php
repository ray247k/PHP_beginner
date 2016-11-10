<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    //判斷是否接收到上傳檔案，是則執行以下程式
    if ($_FILES['upfile']['name']){
        $path = "./upload/";//上傳的目標資料夾
        $url = "http://127.0.0.1/ch4/upload_practice/upload/";//上傳的目標絕對位置，記得結尾斜線！
        $temp = $_FILES['upfile']['tmp_name'];//記憶體暫存
    
        //$filename = $_FILES['upfile']['name'];
        //使用使用這上傳的檔名直接儲存

        $fileNameArray = explode('.',$_FILES['upfile']['name']);
        //用explode方法把檔名藉由.拆成陣列，分割檔名和副檔名
        $filename = $fileNameArray[0].date('Y-m-d').".".$fileNameArray[1];
        //在原始檔名和副檔名中間插入日期格式，設定新的上傳檔名
        
        if (move_uploaded_file($temp,$path.$filename)){
            //move_uploaded_file(暫存檔名,路徑,最終檔名)
            echo "上傳成功看圖<a href=".$url.$filename.">看圖</a>";
        }else {
            echo "上傳失敗<a href=\"file.html\">回上一頁上傳</a>";
        }
        
    }
    //若是沒有選擇檔案就按下上傳，則印出以下內容
    else {
        echo "您沒有上傳檔案<a href=\"file.html\">回上一頁上傳</a>";
    }
    
    
    ?>
</body>
</html>
