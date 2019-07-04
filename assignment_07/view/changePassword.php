<?php
include ('../controller/account_handle.php');
?>

<?php include ('header.php'); ?>
    <section>
        <form action="" method="post">
            <label>Old Password:</label>
            <input type="password" name="old_pass" maxlength="30" placeholder="Enter Old Password">
            <br>
            <label>New Password:</label>
            <input type="password" name="new_pass" maxlength="30" placeholder="Enter New Password">
            <br>
            <label>New Password:</label>
            <input type="password" name="re_enter" maxlength="30" placeholder="Re-enter New Password">
            <br>
            <label></label>
            <input type="submit" name="cancel" value="Cancel" id="cancel">
            <input type="submit" name="change_pass" value="Change Password" id="submit">
        </form>
    </section>
<?php include ('footer.php'); ?>

<?php
include ('../controller/account_change_pass.php');
?>

