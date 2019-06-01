<?php
    //ax^2 + bx + c = 0
    $a = 4;
    $b = 5;
    $c = 1;
    $delta = pow($a,2) - (4*$a*$c); //25-16=9

    //delta<0: PT vô nghiệm
    //delta=0: PT có nghiệm kép x1=x2=(-b/2a)
    //delta>0: PT có 2 nghiệm: x1=(-b - sqrt(delta))/2a; x1=(-b + sqrt(delta))/2a
    if ($a==0) {
        echo "Giải phương trình bậc nhất thì qua bài 3";
    }
    else {
        if ($delta<0) {
            echo 'Phương trình vô nghiệm';
        }
        else if ($delta==0) {
            echo 'Phương trình có nghiệm kép: X1 = X2 = ' . (-$b/(2*$a));
        }
        else if ($delta>0) {
            echo 'Phương trình có nghiệm kép là: ';
            echo 'X1 = ' . ((-$b - sqrt($delta))/(2*$a)) . " và " . 'X2 = ' . ((-$b + sqrt($delta))/(2*$a));
        }
    }
?>