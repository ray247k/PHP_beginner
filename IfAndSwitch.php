<?php

//測試次數
define('EXECUTE_TIMS', 100000);
define('THE_NUMBER', 10);
$arrIf = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$arrSwitch = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

$ifStartTime1 = microtime();
foreach ($arrIf as $key => $num) {
    for ($i = 1; $i <= EXECUTE_TIMS; $i++) { 
        if ($num == 1) {
            continue;
        }
        elseif($num == 2){
            continue;
        }
        elseif($num == 3){
            continue;
        }
        elseif($num == 4){
            continue;
        }
        elseif($num == 5){
            continue;
        }
        elseif($num == 6){
            continue;
        }
        elseif($num == 7){
            continue;
        }
        elseif($num == 8){
            continue;
        }
        elseif($num == 9){
            continue;
        }
        elseif($num == 0){
            continue;
        }  
    }
}

$ifEndTime1 = microtime();
echo($ifEndTime1 - $ifStartTime1);
echo(' <- if');
echo("\n");

$switchStartTime1 = microtime();
foreach ($arrSwitch as $key => $num) {
    for ($i = 1; $i <= EXECUTE_TIMS; $i++) { 
        switch ($num) {
            case '1':
                # code...
                break;
            case '2':
                # code...
                break;
            case '3':
                # code...
                break;
            case '4':
                # code...
                break;
            case '5':
                # code...
                break;
            case '6':
                # code...
                break;
            case '7':
                # code...
                break;
            case '8':
                # code...
                break;
            case '9':
                # code...
                break;
            default:
                # code...
                break;
        }
    }
}
$switchEndTime1 = microtime();
echo($switchEndTime1 - $switchStartTime1);
echo(' <- switch');
echo("\n");


$ifStartTime2 = microtime();
for ($i = 1; $i <= EXECUTE_TIMS; $i++) { 
    if (THE_NUMBER == 1) {
        break;
    }
    elseif(THE_NUMBER == 2){
        break;
    }
    elseif(THE_NUMBER == 3){
        break;
    }
    elseif(THE_NUMBER == 4){
        break;
    }
    elseif(THE_NUMBER == 5){
        break;
    }
    elseif(THE_NUMBER == 6){
        break;
    }
    elseif(THE_NUMBER == 7){
        break;
    }
    elseif(THE_NUMBER == 8){
        break;
    }
    elseif(THE_NUMBER == 9){
        break;
    }
    elseif(THE_NUMBER == 0){
        break;
    }  
}
$ifEndTime2 = microtime();
echo($ifEndTime2 - $ifStartTime2);
echo(' <- if');
echo("\n");

$switchStartTime2 = microtime();
for ($i = 1; $i <= EXECUTE_TIMS; $i++) { 
    switch (EXECUTE_TIMS) {
        case '1':
            # code...
            break;
        case '2':
            # code...
            break;
        case '3':
            # code...
            break;
        case '4':
            # code...
            break;
        case '5':
            # code...
            break;
        case '6':
            # code...
            break;
        case '7':
            # code...
            break;
        case '8':
            # code...
            break;
        case '9':
            # code...
            break;
        default:
            # code...
            break;
    }
}
$switchEndTime2 = microtime();
echo($switchEndTime2 - $switchStartTime2);
echo(' <- switch');

