<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>三個月業績輸入</title>
</head>

<body>
    <form method="post" action="output.php"> 阿寶:
        <br>
        <p>第一個月業績
            <input type="text" name="bay[]"> </p>
        <p>第二個月業績
            <input type="text" name="bay[]"> </p>
        <p>第三個月業績
            <input type="text" name="bay[]"> </p>
        <hr> 阿花:
        <br>
        <p>第一個月業績
            <input type="text" name="flower[]"> </p>
        <p>第二個月業績
            <input type="text" name="flower[]"> </p>
        <p>第三個月業績
            <input type="text" name="flower[]"> </p>
        <input type="submit" value="送出"> </form>
</body>

</html>