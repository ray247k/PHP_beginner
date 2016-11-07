<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sort</title>
</head>

<body>
    <?php
    $price = array(300,800,100,200,500);
    echo "sort()排序前<br>";
    var_dump($price);
    echo "<br>";
    sort($price);
    echo "<br>";
    echo "使用sort()排序後，依照陣列內容大小排序(文字也可以)，並改變索引值<br>";
    var_dump($price);
    echo"<hr>";
    
    $car = array('carＡ'=>500,'carF'=>100,'carD'=>800,'carE'=>600,'carB'=>200,'carC'=>300);
    echo "<br>asort()排序前<br>";
    var_dump($car);
    echo "<br>";
    asort($car);
    echo "<br>";
    echo "使用asort()排序後，依照內容大小排序，但「維持原index」<br>";
    var_dump($car);    
    echo"<hr>";
    
    echo "<br>若在有指定index的陣列中使用sort()，則原index會被覆蓋過去<br>";
    echo "<br>sort()排序前<br>";
    var_dump($car);
    echo "<br>";
    sort($car);
    echo "<br>";
    echo "使用sort()排序後<br>";
    var_dump($car);
    echo"<hr>";
    
    $caca = array('a'=>500,'e'=>450,'f'=>100,'d'=>800,'b'=>200,'c'=>300);
    echo "<br>kort()排序前<br>";
    var_dump($caca);
    echo "<br>";
    ksort($caca);
    echo "<br>";
    echo "使用ksort()排序後，依照index大小排序，並維持原index<br>";
    var_dump($caca);
    echo"<hr>";

    
    ?>
</body>

</html>