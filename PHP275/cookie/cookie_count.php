<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>計算上站次數</title>
</head>

<body>
    <?php
//    直覺的寫法
//    if(isset($_COOKIE['Time'])){
//      若已經上站過了，就把原有的cookie重新設定成員cookie+1
//       setcookie("Time",$_COOKIE['Time']+1);
//    } else {
//      若沒上站過，就把cookie設成1
//       setcookie("Time", 1);
//    }
//      印出剛剛設定的cookie
//    echo "您的上站次數為：".$_COOKIE['Time'];

//進階的寫法是，既然要set兩次cookie，那乾脆用變數控制cookie值
//這要先從echo開始看
//印出上站次數為$times，那$times值為何？首先先看若原本沒有設定cookie的時候
//isset回傳值為FALSE執行else內容，$times = 1;得到$times的值為一
//也就是第一次上站，setcookie的值就是剛剛的$times，因為是第一次上站
//所以是1也是合情合理的
//如此有了COOKIE之後，下一次執行網頁isset為TRUE
//$times就是原有的COOKIE值+1，再傳給後面的echo出次數，並且重新設定cookie值

    if(isset($_COOKIE['Time'])){
        $times = $_COOKIE['Time']+1;
    } else {
        $times = 1;
    }
    echo "您的上站次數為：".$times;
    setcookie("Time", $times);
    ?>
</body>

</html>