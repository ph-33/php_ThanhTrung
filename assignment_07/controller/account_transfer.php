<?php
$account_send = $_SESSION['user'];
$account_receive = filter_input(INPUT_POST, 'account_receive');
$amount_transfer = filter_input(INPUT_POST, 'amount_transfer');

$accounts = DAO::getAccount();
foreach ($accounts as $send) {
    if($account_send == $send->getAccountNo() && $amount_transfer <= $send->getAmount() &&
        $amount_transfer!==null && $amount_transfer!=='') {
        foreach ($accounts as $receive) {
            if($account_receive == $receive->getAccountNo()) {
                DAO::transfer($account_send, $account_receive, $amount_transfer);
                header('Location: viewAccount.php');
            }
        }
    }
}
?>
