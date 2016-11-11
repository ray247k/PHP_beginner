<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查詢結果</title>
</head>
<body>
    <?php
    include("verify.php");
    $id = $_POST['id'];
    $pwd = $_POST['pwd'];
    $message = verify($id,$pwd);
    echo "您搜尋的帳號為".$id."，Email為".$message;
    ?>
</body>
</html>