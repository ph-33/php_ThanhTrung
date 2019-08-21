<?php include 'view/layouts/header.php'; ?>
<?php include 'view/layouts/sidebar.php'; ?>
<main>
    <h1>Your Account Information</h1>
    <form action="" method="post">
        <fieldset>
            <legend>Login</legend>
            <label>First Name: </label>
            <label class="account_info"><?php echo $_SESSION['customer']['firstName'] ?></label><br>

            <label>Last Name: </label>
            <label class="account_info"><?php echo $_SESSION['customer']['lastName'] ?></label><br>

            <label>Email: </label>
            <label class="account_info"><?php echo $_SESSION['customer']['emailAddress'] ?></label><br>

            <label></label>
            <input type="submit" name="customer" value="Edit">
            <input type="submit" name="customer" value="Change Password"><br>
        </fieldset>
        <fieldset>
            <legend>Address List</legend>
            <?php $i=0; ?>
            <?php foreach ($addresses as $address) : ?>
                <?php $i++; ?>
            <fieldset>
                <legend>Address <?php echo $i; ?></legend>
                <label>Line 1:</label>
                <label class="account_info"><?php echo htmlentities($address['line1']); ?></label><br>

                <label>Line 2:</label>
                <label class="account_info">
                    <?php
                        if(!empty($address['line2'])) {
                            echo htmlentities($address['line2']);
                        }else {
                            echo 'N/A';
                        }
                    ?>
                </label><br>

                <label>City:</label>
                <label class="account_info"><?php echo htmlentities($address['city']); ?></label><br>

                <label>State:</label>
                <label class="account_info"><?php echo htmlentities($address['state']); ?></label><br>

                <label>Zip Code:</label>
                <label class="account_info"><?php echo htmlentities($address['zipCode']); ?></label><br>

                <label>Phone:</label>
                <label class="account_info"><?php echo htmlentities($address['phone']); ?></label><br>
            </fieldset>
            <?php endforeach; ?>
            <br>
            <input type="submit" name="customer" value="Change Address" style="float: right"><br>
        </fieldset>
        <fieldset>
            <legend>Order</legend>
            <table border="1" width="100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Order Day</th>
                        <th>Ship Day</th>
                        <th>Ship Address</th>
                        <th>Bill Address</th>
                        <th>Total</th>
                        <th>View</th>
                    </tr>
                </thead>
                <?php if (empty($orders)) :?>
                <tbody>
                    <tr><td colspan="7">No Order</td></tr>
                <?php else :?>
                    <?php $i=0; ?>
                    <?php foreach ($orders as $order) : ?>
                        <?php $i++; ?>
                        <tr>
                            <td class="right"><?php echo $i; ?></td>
                            <td class="right"><?php echo $order['orderDate']; ?></td>
                            <td class="right">
                                <?php
                                if(!empty($order['shipDate'])) {
                                    echo $order['shipDate'];
                                }else {
                                    echo 'N/A';
                                }
                                ?>
                            </td>
                            <td><?php echo $addr[$order['orderID']]['shipAddress']; ?></td>
                            <td><?php echo $addr[$order['orderID']]['billingAddress']; ?></td>
                            <td class="right">$<?php echo $totals[$order['orderID']]; ?></td>
                            <td><a href="?action=order_detail">Detail</a></td>
                            <input type="hidden" name="order_id" value="<?php echo $order['orderID']; ?>">
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td><b>Total:</b></td>
                        <td colspan="4"></td>
                        <td class="right"><b>$<?php echo array_sum($totals); ?></b></td>
                        <td></td>
                    </tr>
                </tfoot>
                <?php endif ?>
            </table>
        </fieldset>
    </form>
</main>
<?php include 'view/layouts/footer.php'; ?>
