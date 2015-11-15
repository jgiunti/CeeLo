<?php

$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];



$dArray = array($d1, $d2, $d3);

sort($dArray);


if($dArray[0] == 1 && $dArray[2] == 2 && $dArray[3] == 3) {
    echo 'lose';
}
elseif ($dArray[0] == 4 && $dArray[1] == 5 && $dArray[2] == 6) {
    echo 'win';
}
else {
    if($dArray[0] == $dArray[1]) {
        echo $dArray[2];
    }
    elseif($dArray[1] == $dArray[2]) {
        echo $dArray[0];
    }
    else {
        echo 'roll again';
    }
}



