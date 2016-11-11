<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>一萬次擲骰</title>
</head>

<body>
    <?php
    //全域變數$total整隻程式都可以用
    $total= array(0,0,0,0,0,0);//設定一個長度為6的陣列，內容皆為0
//    for($i=0;$i<=10000;$i++){
//        取得一萬次值骰資料，放入陣列對應索引內
//        $dice = rand(1,6);
//        switch($dice){
//            case 1;
//                $total[0]++;
//                break;
//            case 2;
//                $total[1]++;
//                break;
//            case 3;
//                $total[2]++;
//                break;
//            case 4;
//                $total[3]++;
//                break;
//            case 5;
//                $total[4]++;
//                break;
//            case 6;
//                $total[5]++;
//                break;
//        }
//    }
    for($i=0;$i<10000;$i++){
        $total[(rand(1,6)-1)]++;
    }
    //直接擲骰隨機取得1~6之後，把擲骰結果(1~6)減一，符合陣列索引值(0~5)後把內容+1
    for($j=0;$j<count($total); $j++){
        echo "點數".($j+1)."總共出現".$total[$j]."次，機率為".($total[$j]/100)."%<br>";
    }
    ?>
</body>

</html>