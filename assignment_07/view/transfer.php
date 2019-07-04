<?php
include ('../controller/account_handle.php');
?>
<?php include ('header.php'); ?>
    <section>
        <form action="" method="post">
            <label>Your Account:</label>
            <input type="text" name="account_send" value="<?php echo $account_no; ?>" disabled>
            <br>
            <label>Your Amount:</label>
            <input type="text" name="amount_current" value="<?php echo  number_format($amount,3); ?>" disabled>
            <br>
            <label>Transfer Amount: </label>
            <input type="text" name="amount_transfer" pattern="[0-9]{1,8}"
                   title="Transfer amount is number and the maximum transfer amount is 99 999 999">
            <br>
            <label>Receive Account: </label>
            <select name="account_receive">
                <option>--- Select Receive Account ---</option>
                <?php foreach ($accounts as $account) : ?>
                    <?php if($_SESSION['user'] !== $account->getAccountNo()): ?>
                        <option><?php echo $account->getAccountNo();?></option>
                    <?php endif?>
                <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" name="cancel" value="Cancel" id="cancel">
            <input type="submit" name="transfer" value="Transfer Now" id="submit">
        </form>
    </section>
<?php include ('footer.php'); ?>

<?php
include ('../controller/account_transfer.php');
?>
