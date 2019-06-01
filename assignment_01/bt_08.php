<?php
    $n = 3;
    switch($n) {
        case 2:
            echo 'Tháng ' . $n . ' có 28 ngày';
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            echo 'Tháng ' . $n . ' có 30 ngày';
            break;
        case 1:
        case 3:
        case 5:
        case 7:
        case 8:
        case 10:
        case 12:
            echo 'Tháng ' . $n . ' có 31 ngày';
            break;
        default:
            echo 'Tháng không hợp lệ';
            break;
    }
?>