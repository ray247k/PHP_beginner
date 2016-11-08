<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>轉換</title>
</head>

<body>
    <?php
        $word = "My name is Dennis";
        $space = "     abc    d     ef     ";
        echo "原字串：".$word."<br>";
        echo "使用strtolower()方法可以將字串設成全部小寫"."<br>";
        echo strtolower($word)."<br>";
        echo "使用strtolower()方法可以將字串設成全部大寫"."<br>";    
        echo strtoupper($word)."<br>";
        echo "<hr>";
    
        echo "使用trim()方法可以將字串「前後空白」刪除"."<br>";    
        echo "gggg".$space."gggggggg"."<br>";
        echo "gggg".trim($space)."gggggggg"."<br>";
        echo "<hr>";
    
        $rep = "My user name is Qian";
        echo "使用str_replace('Qian','Ray247',\$rep)可以將「指定字元」取代，若用空白取代則為刪除"."<br>";        
        echo "原字串".$rep."<br>";
        echo "改變後".str_replace("Qian","Ray247",$rep);
        echo "<hr>";
    
        $url = "www.nfu.edu.tw";
        echo "使用explode('.',\$url)將字串用前方字元分割，並存成字串"."<br>"; 
        echo "拆分前：".$url."<br>";
        var_dump(explode(".",$url));
        echo "<hr>";
    
        echo "使用strlen()計算內容長度"."<br>";    
        echo "字串「abcdefg」的長度為：".strlen("abcdefg");
        echo "<hr>";
    
        echo "使用substr(abcdefg,3,5)方法擷取部分字串"."<br>";    
        echo substr("abcdefg",3,5)."<br>"."若第三個變數沒指定，代表從起始位元後全部擷取";
        echo "<hr>";
    
        $score =123.45678;
        echo "原始數列：".$score."<br>";
        echo "絕對值 abs(-12345)：".abs(-12345)."<br>";
        echo "四捨五入 round(\$score, 2)：".round($score, 2)."<br>";   
        echo "無條件進位 ceil(\$score)：".ceil($score)."<br>";
        echo "無條件捨去 floor(\$score)：".floor($score)."<br>";
        echo "<hr>";
        echo "數字格式化 = 每三位數加一個逗點number_format(10000000)："."<br>".number_format(10000000);
    
    ?>
</body>

</html>