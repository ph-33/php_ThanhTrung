<?php include ('header.php'); ?>
    <section>
        <form action="" method="post">
            <label>Old Password:</label>
            <input type="password" name="old_pass" maxlength="30" placeholder="Enter Old Password" autofocus>
            <br>
            <label>New Password:</label>
            <input type="password" name="new_pass" maxlength="30" placeholder="Enter New Password">
            <br>
            <label>New Password:</label>
            <input type="password" name="re_enter" maxlength="30" placeholder="Re-enter New Password">
            <br>
            <label></label>
            <button type="submit" name="action" value="cancel" id="cancel">Cancel</button>
            <button type="submit" name="action" value="change_pass" id="submit">Change Password</button>
        </form>
        <?php if (isset($message)):?>
            <h3 style="color: red;"><?php echo $message; ?></h3>
        <?php endif ?>
    </section>
<?php include ('footer.php'); ?>
