<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>歡迎下載</title>
</head>

<body>
    <?php
        if(isset($_COOKIE['click'])){
            echo "來喔下載囉";
        }else{
            echo "天下沒有白吃的午餐啦"."<br>"."<a href = 'adver.php'>ㄘ廣告啦</a>";
        }
    
    ?>
</body>

</html>