<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>查詢結果</title>
</head>

<body>
    <?php
    //輸入單字查詢的結果
    require("db.php");
    $word = strtolower($_POST['word']);
    $nofound = true;
    foreach($dic as $letter => $words){
        //拆解$dic陣列，$letter = A~Z，$words是內含單字的陣列
       foreach($words as $eng => $chi){
            var_dump($words);
            //var_dump($eng);
           echo "<br>";
           //單字內容的「陣列」中索引值是英文單字$eng，資料是中文$chi
           //以下為檢查方式
           //echo $eng." = ".$chi."<br>";
           if($word == $eng){
               echo $_POST['word']." 的中文翻譯為：".$chi."<br>";
               $nofound = FALSE;
           }elseif($word == $chi){
               echo $_POST['word']." 的英文翻譯為：".$eng."<br>";
               $nofound = FALSE;
           }
            break;
        }
    }
    if($nofound){
            echo "抱歉，本字典無 ".$_POST['word']." 這個詞彙";
       } 
    ?>
</body>

</html>