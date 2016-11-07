<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>業績結果</title>
</head>

<body>
    <?php
    $score['阿寶'] = $_POST['bay'];
    $score['阿花'] = $_POST['flower'];
    $total['阿寶'] = 0;
    $total['阿花'] = 0;
    foreach($score as $name=>$rowData){
        //$score陣列是一個二維陣列
        //外層把$score['阿寶']和$score['阿花']分別拆成一維陣列
        foreach($rowData as $Data){
        //把rowData為$score['阿寶']和 $score['阿花']分別的陣列內榮
        //所以用foreach把裡面的資料一個一個撈出來
            $total[$name] += $Data;//$name作為索引值，呼應的是最外層foreach用的索引值
        }
    }
    
    echo "阿寶的業績為".$total['阿寶']."<br>";
    echo "阿花的業績為".$total['阿花']."<br>";
    
    if ($total['阿寶'] > $total['阿花']){
        echo "阿寶業績比較好";
    } else if ($total['阿寶'] < $total['阿花']){
        echo "阿花業績比較好";
    } else {
        echo "平手";
    }    

    ?>
</body>

</html>