<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Foreach</title>
</head>

<body>
    <?php
    $money["Alex"]=12;
    $money["Cindy"]=85;
    $money["Flora"]=5;
    $money["Bill"]=20;
    $money["Doris"]=66;
    $money["Gina"]=20;
    $money["Eric"]=53;
    //把陣列裡面的值一個一個讀出來
    //foreach($陣列 as $索引值=> $資料)變數名稱可以自己改變
    foreach($money as $index => $data){
        echo "姓名".$index."<br>"."總存款為".$data."萬元<hr>";
    }
    //也可以不設定索引值直接撈出陣列內容，例如以下
    $total=0;
    //直接省略$index=>$data代表直接呼叫資料，不論索引值
    foreach($money as $data){
        $total += $data; 
    }
    echo "以上總存款為".$total."萬元<hr>";
    ?>
</body>

</html>