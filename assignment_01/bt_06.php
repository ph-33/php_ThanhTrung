<?php
    //Fibonacci: 0   1   1   2   3   5   8   13   21....

    // recursion
    function f($n) {
        if($n==0||$n==1) {
            return $n;
        }
        else {
            return (f($n-1)+f($n-2));
        }
    }

    // non recursion
    function fibo($x) {
        $f0 = 0;
        $f1 = 1;
        $fx = 1;

        if($x==0||$x==1) {
            return $x;
        }
        else {
            for ($i=2;$i<$x;$i++){
                $f0 = $f1;
                $f1 = $fx;
                $fx = $f0+$f1;
            }
        }
        return f($x);
    }

    // first 20 numbers of Fibonacci
    for ($i=0;$i<20;$i++) {
        echo f($i)."    ";
    }
    echo "\n";
    for ($i=0;$i<20;$i++) {
        echo fibo($i)."    ";
    }
?>