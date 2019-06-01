<?php
    // USCLN của 2 số nguyên dương a và b là một số k lớn nhất, sao cho a và b đều chia hết cho k.
    //BSCNN của 2 số nguyên dương a và b là một số h nhỏ nhất, sao cho h chia hết cho cả a và b.
    //BSCNN(a, b) = (a * b) / UCSLN(a, b).

    function USCLN($a, $b) {
        if ($b == 0) return $a;
        return USCLN($b, $a % $b);
    }

    $a=10;
    $b=5;
    echo 'Ước số chung lớn nhât của '.$a.' và '.$b.' là: '.USCLN($a, $b);
?>