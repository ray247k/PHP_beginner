<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Array01</title>
</head>

<body>
    <?php
    //指定index的陣列宣告方法，第一種
        $array = array(
            "a"=>1,"b"=>2,"c"=>3,"d"=>5,"e"=>8,"f"=>9,"g"=>78,"h"=>798,"i"=>6513,"j"=>15);
    //---------------------------
    
    //指定index的陣列宣告方法，第二種
        $money["Alex"]=12;
        $money["Bill"]=20;
        $money["Cindy"]=20;
        $money["Doris"]=20;
        $money["Eric"]=20;
        $money["Flora"]=20;
        $money["Gina"]=20;
    //-------------------------------
    //兩種都可以在之後加入新的資料
    echo "count方法，算出陣列內有多少東西：<br>第一個陣列："
        .count($array)."<br>第二個陣列：".count($money);
    echo"<hr>";
    echo"var_dump()方法把陣列長度、內容包含型別印出：<br>";
    echo "第一個陣列：";
    var_dump($array);
    echo "<br>第二個陣列：";
    var_dump($money);
    echo "<hr>";
    echo"print_r()列出內容，不包含長度和型別：<br>";
    echo "第一個陣列：";    
    print_r($array);
    echo "<br>第二個陣列：";
    print_r($money);

    
    
    ?>
</body>

</html>