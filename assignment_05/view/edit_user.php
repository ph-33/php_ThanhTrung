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
        <input type="text" name="email" value="<?php echo htmlentities($user->getEmail()); ?>" readonly><br>

        <label>First Name:</label>
        <input type="text" name="fName" value="<?php echo htmlentities($user->getFName()); ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="lName" value="<?php echo htmlentities($user->getLName()); ?>"><br>

        <button type="submit" name="action" value="update">Save</button>
        <button type="submit" name="action" value="cancel">Cancel</button>
    </form>

</main>
</body>
</html>