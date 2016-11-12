<!DOCTYPE html>
<?php
        if(isset($_COOKIE['user'])){
        //判斷$_COOKIE['user']有沒有設定
            $message = 'Hi，你是'.$_COOKIE['user'];
        }else{
        //沒有則設定$_Cookie['user'] = 'allen' 存在時間是60秒
            setCookie('user','allen',date('U')+60);
            $message = '我現在不知道你是誰下次就知道了';
        }
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Cookie</title>
    </head>

    <body>
        <?php
        echo $message;    
    ?>
    </body>

    </html>