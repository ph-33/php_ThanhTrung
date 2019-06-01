<?php
    //ax+b=0
    $a=5;
    $b=7;

    if ($a==0&&$b!=0) {
        echo 'Phương trình vô nghiệm. Không có giá trị nào của X thỏa mãn yêu cầu bài toán.';
    }
    elseif ($a==0&&$b==0) {
        echo 'Phương trình có vô số nghiệm. X = bao nhiêu cũng được.';
    }
    elseif ($a!=0&&$b==0) {
        echo 'Phương trình có 1 nghiệm. X = 0';
    }
    else {
        echo 'Phương trình có 1 nghiệm. X = ' . (-$b/$a);
    }
?>