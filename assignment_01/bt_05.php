<?php
    $sum=0;
/*==================================================*/
    // for
    for ($i=1; $i<=50;$i++) {
        $sum = $sum+$i;
    }
/*==================================================*/

/*==================================================*
    // while
    $i=1;
    while($i<=50) {
        $sum = $sum+$i;
        $i++;
    }
/*==================================================*/

/*==================================================*
    // do while
    $i=1;
    do {
        $sum = $sum+$i;
        $i++;
    }
    while($i<=50);
/*==================================================*/
    echo 'Tổng các số tự nhiên từ 1 -> 50 là: ' .$sum;
?>