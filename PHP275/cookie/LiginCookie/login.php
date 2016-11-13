<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>歡迎使用</title>
</head>

<body>
    <?php
        $db_id = 'allen';
        $db_pwd = '1234';
        $id = $_POST['id'];
        $pwd = $_POST['pwd'];

        if(($_POST['id']==$db_id) && ($_POST['pwd']== $db_pwd)){
            setcookie('id',$_POST['id'],date('U')+40);
            setcookie('pwd',$_POST['pwd'],date('U')+40);
            echo "歡迎登入：".$_POST['id']."<br>"."這是主頁內容";
        }elseif(($_COOKIE['id']==$db_id) && ($_COOKIE['pwd']==$db_pwd)){
            echo $_COOKIE['id']." 歡迎回來<br>這是主頁內容";
        }else{
            echo "您尚未登入<br><a href='input.html'>回上頁</a>";
        }
        
    ?>
</body>

</html>