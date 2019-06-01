<?php

$studentCode = '';
$studentName = '';
$studentAge = '';
$studentSex = '';


?>
<html>
<head>
    <title>Bài tập 07</title>
</head>
<body>
<form action="display.php" method="post">
    <label>Student Code: </label>
    <input type="text" name="student_code" value="<?php echo htmlspecialchars($studentCode); ?>"><br><br>

    <label>Student Name: </label>
    <input type="text" name="student_name" value="<?php echo htmlspecialchars($studentName); ?>"><br><br>

    <label>Student Age: </label>
    <input type="text" name="student_age" value="<?php echo htmlspecialchars($studentAge); ?>"><br><br>

    <label>Student Sex: </label>
    <input type="radio" name="student_sex" value="Male">Male
    <input type="radio" name="student_sex" value="Female">Female<br><br>

    <label>&nbsp;</label>
    <input type="submit" value="View"><br>
</form>
</body>
</html>
