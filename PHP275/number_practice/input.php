<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>數字判斷</title>
</head>

<body>
    <div>設計一個表單，讓使用者可以填寫一個 數字格式的文字欄位 若使用者輸入的內容不是數字則印出錯誤訊息 若是數字則計算出：
        <ol>
            <li>絕對值</li>
            <li>四捨五入後的值</li>
            <li>無條件進位的值</li>
            <li>無條件捨去的值</li>
        </ol>
    </div>
    <form action="output.php" method="get"> 輸入數字
        <input type="text" name="num">
        <input type="submit" name="submit" value="送出計算"> </form>
</body>

</html>