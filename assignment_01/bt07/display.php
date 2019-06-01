<?php

    $studentCode = filter_input(INPUT_POST, 'student_code');
    $studentName = filter_input(INPUT_POST, 'student_name');
    $studentAge = filter_input(INPUT_POST, 'student_age', FILTER_VALIDATE_INT);
    $studentSex = filter_input(INPUT_POST, 'student_sex');


?>
<html>
    <head>
        <title>Bài tập 07</title>
    </head>
    <body>
            <label>Student Code: </label>
            <span><?php echo $studentCode; ?></span><br><br>

            <label>Student Name: </label>
            <span><?php echo $studentName; ?></span><br><br>

            <label>Student Age: </label>
            <span><?php echo $studentAge; ?></span><br><br>

            <label>Student Sex: </label>
            <span><?php echo $studentSex; ?></span><br><br>
    </body>
</html>
