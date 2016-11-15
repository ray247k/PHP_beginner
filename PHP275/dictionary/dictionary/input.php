<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>進階水果字典</title>
</head>

<body>
    <form action="output.php" method="post">
        <h1>字典查詢</h1> 輸入要查詢的中/英文單字：
        <input type="text" name="word">
        <br>
        <br>
        <input type="submit" name="submit" value="送出查詢"> </form>
    <br>
    <br>
    <!--點選英文字母，超連結引導到結果網頁，並且在後面加上get方法傳值-->
    或直接瀏覽單字列表：
    <?php
    foreach(range('A','Z') as $letter){
        $lowerLetter = strtolower($letter);
        echo "<a href='result.php?letter=".$lowerLetter."'>".$letter."</a>"." ";
    }
    ?>

</body>


</html>