<?php
include ('../controller/account_handle.php');
?>

<?php include ('header.php'); ?>
    <section>
        <label>Account No:</label>
        <input type="text" name="account_no" value="<?php echo $_SESSION['user'];?>" disabled>
        <br>
        <label>Owner Name:</label>
        <input type="text" name="owner_name" value="<?php echo $owner_name;?>" disabled>
        <br>
        <form action="viewAccount.php" method="post">
            <input type="submit" name="show_more" value="Show More Information" id="show">
        </form>
    </section>
<?php include ('footer.php'); ?>
