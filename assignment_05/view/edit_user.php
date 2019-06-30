<?php
require ('../controller/user_controller.php');
require ('../model/database.php');
require ('../model/user_db.php');

$userControl = new Actions();

$email = filter_input(INPUT_POST, 'email');
$user = UserDB::getUserDetail($email);

$userControl->edit();

?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
</head>
<body>
<h1>LIST OF USERS</h1>
<main>
    <form action="" method="post">
        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $user->getEmail(); ?>" readonly><br>

        <label>First Name:</label>
        <input type="text" name="fName" value="<?php echo $user->getFName(); ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="lName" value="<?php echo $user->getLName(); ?>"><br>

        <input type="submit" name="save" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</main>
</body>
</html>