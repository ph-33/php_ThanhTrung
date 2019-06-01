<?php
    echo "Nhập điểm môn Toán: ";
    $math = (float)fgets(fopen('php://stdin','r'));
    echo "Nhập điểm môn Lý: ";
    $physics = (float)fgets(fopen('php://stdin','r'));
    echo "Nhập điểm môn Hóa: ";
    $chemistry = (float)fgets(fopen('php://stdin','r'));

    $avg = (float)($math + $physics + $chemistry)/3;

    $rank = '';

    //if else
    if ($avg>=8.0){
        $rank = 'A';
    } else if ($avg>=6.5){
        $rank = 'B';
    } else if ($avg>=5.0) {
        $rank = 'C';
    } else if ($avg<=5.0) {
        $rank = 'D';
    }
    echo 'Điểm trung bình: '.$avg;
    echo "\n";
    echo 'Xếp loại: '.$rank;
?>