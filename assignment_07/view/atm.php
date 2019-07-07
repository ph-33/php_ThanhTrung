<?php include ('header.php');?>
    <section>
        <label>Account No:</label>
        <input type="text" name="account_no" value="<?php echo $_SESSION['user'];?>" disabled>
        <br>
        <label>Owner Name:</label>
        <input type="text" name="owner_name" value="<?php echo $owner_name;?>" disabled>
        <br>
        <form action="" method="post">
            <input type="hidden" name="action" value="show_more">
            <input type="submit" value="Show More Information" id="show">
        </form>
        <?php if (isset($message)):?>
            <h3 style="color: red;"><?php echo $message; ?></h3>
        <?php endif ?>
    </section>
<?php include ('footer.php');?>
