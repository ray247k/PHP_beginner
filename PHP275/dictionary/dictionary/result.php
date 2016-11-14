<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>瀏覽結果</title>
</head>

<body>
    <?php
    //直接查詢字母
    require("db.php");
        $letter = $_GET['letter'];//
        echo "<h1>".strtoupper($letter)."：</h1>";//點選的英文
        //var_dump($dic[$letter]);看看得到的值
        foreach($dic[$letter] as $eng =>$chi){
            echo $eng." : ".$chi."<br>";
        }
    ?>
        <br>
        <br> <a href="input.html">回查詢結果</a> </body>

</html>