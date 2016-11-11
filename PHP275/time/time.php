<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>time</title>
</head>

<body>
    <?php
        date_default_timezone_set("Asia/Taipei");
        //設定此php時區
        echo date('Y-m-d H:i:s')."<br>";
        echo "今天是民國".(date('Y')-1911)."年".date('m')."月".date('d')."日"."<br>";
        
        if(date('a')=="am"){
            $ap = "早上";
        }
        elseif(date('a')=="pm"){
            $ap = "下午";
        }
    
        echo "現在是".$ap.date('h')."點".date('i')."分".date('s')."秒"."<hr>";

        $Date = mktime(0,0,0,2,1,2017);
        $diff = $Date - date('U');//得到未來和現在的秒數差
        
        $day_diff = floor($diff/60/60/24);
        
        $hour_diff = floor(($diff - $day_diff*60*60*24)/60/60);
    
        $min_diff = floor(($diff - $day_diff*60*60*24 - $hour_diff*60*60)/60);
    
        $second_diff = floor($diff - $day_diff*60*60*24 - $hour_diff*60*60 - $min_diff*60);
    
        echo "距離2017/02/01  還有".$day_diff."天".$hour_diff."小時".$min_diff."分鐘".$second_diff."秒";
    ?>
</body>

</html>