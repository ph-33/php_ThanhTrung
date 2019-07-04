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
        <label>Amount:</label>
        <input type="text" name="amount" value="<?php echo $amount;?>" disabled>
        <br>
        <label>Account Type:</label>
        <input type="text" name="account_type" value="<?php echo $account_type;?>" disabled>
        <br>
        <form action="atm.php" method="post">
            <input type="submit" name="show_less" value="Show Less Information" id="show">
        </form>
    </section>
<?php include ('footer.php'); ?>