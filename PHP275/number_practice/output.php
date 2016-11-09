<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>結果</title>
</head>

<body>
    <?php
    $num = $_GET["num"];
    echo "您的輸入為：".$num."<br>";
    if(!is_numeric($num)){//判斷若輸入「不是數字」執行
        echo "請輸入數字"."<br>";
        echo "<a href='input.php'>
                <br>回上一頁重新輸入</a>";
        exit();//直接挑出程式，以下都不執行，節省記憶體
    }
    echo "絕對值為：".abs($num)."<br>";
    echo "四捨五入到第二位的值：".round($num)."<br>";
    echo "無條件進位的值：".ceil($num)."<br>";
    echo "無條件捨去的值：".floor($num)."<br>";
    
    
    ?>
</body>

</html>