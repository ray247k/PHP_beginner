<?php
function verify($id,$pwd){
    require("user.php");//讀入資料庫內容
    $message = "此帳號不存在，請<a href = \"login.html\">回上頁</a>重新輸入";
    foreach($user as $name){//判斷輸入名稱是否存在資料庫
        if ($id == $name){
            if($pwd == $userData[$name]['password']){//判斷密碼是否符合
                $message = $userData[$name]['email'];
                 } else {
                   $message = "密碼輸入錯誤，不提供資訊 <a href = \"login.html\">回上頁</a>";
                
            }
            break;
        }
     }
     return $message;
}


?>