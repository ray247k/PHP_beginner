<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>查詢結果</title>
</head>

<body>
    <?php
    //內建資料庫
    $fruit["apple"]="蘋果";
    $fruit["orange"]="橘子";
    $fruit["watermelon"]="西瓜";
    $fruit["strawberry"]="草莓";
    $fruit["pineapple"]="鳳梨";
    
    $word = $_GET["word"];//取得輸入
    $nofound = true;//判斷是否存在資料庫的變數
    foreach($fruit as $index => $data){//把資料庫內資料一筆一筆列出
        if($index == $word){//逐一比較，若是和輸入值相等
            echo "<table border='1' width='200'>";    
                echo "<tr>"."<td>"."英文"."</td>"."<td>"."中文"."</td>";
                echo "<tr>";//一開始串在一起太多東西，自己看不懂只好弄得結構一點
                    echo "<td>";
                        echo $index;
                    echo "</td>";
            
                    echo "<td>";
                        echo $data;
                    echo "</td>";
                echo "</tr>";//印出資料
                $nofound = false;//判斷函數為否
            break;//結束foreach迴圈
        }
    }
    echo"</table>";
    if ($nofound){//若nofound是真，代表資料庫無此資料
        echo "水果字典中沒有"."<font color=red>".$word."</font>"."這個單字";
    }
    ?>
        <br>
        <br><a href="hw3.html">返回查詢頁面</a>
        <!--測試的時候一直按上一頁太麻煩了，一直按到書籤-->
</body>

</html>