<?php include ('header.php'); ?>
    <section>
        <form action="" method="post">
            <label>Your Account:</label>
            <input type="text" name="account_sender" value="<?php echo htmlentities($account_send); ?>" disabled>
            <br>
            <label>Your Amount:</label>
            <input type="text" name="amount_sender" value="<?php echo htmlentities(number_format($amount,3)); ?>" disabled>
            <br>
            <label>Transfer Amount: </label>
            <input type="text" name="amount_transfer" pattern="[0-9]{1,8}"
                   title="Transfer amount is number and the maximum transfer amount is 99 999 999">
            <br>
            <label>Receive Account: </label>
            <select name="account_receiver">
                <option>--- Select Receive Account ---</option>
                <?php foreach ($accounts as $account) : ?>
                    <?php if($_SESSION['user'] !== $account->getAccountNo()): ?>
                        <option><?php echo $account->getAccountNo();?></option>
                    <?php endif?>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit" name="action" value="cancel" id="cancel">Cancel</button>
            <button type="submit" name="action" value="transfer" id="submit">Transfer Now</button>
        </form>
        <?php if (isset($message)):?>
            <h3 style="color: red;"><?php echo $message; ?></h3>
        <?php endif ?>
    </section>
<?php include ('footer.php'); ?>