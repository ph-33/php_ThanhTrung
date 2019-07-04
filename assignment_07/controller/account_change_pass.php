<?php
$current_account = $_SESSION['user'];
$old_pass = filter_input(INPUT_POST, 'old_pass');
$new_pass = filter_input(INPUT_POST, 'new_pass');
$re_enter  = filter_input(INPUT_POST, 're_enter');

$accounts = DAO::getAccount();

if($new_pass===$re_enter && $new_pass!==null && $new_pass!=='' && $re_enter!==null && $re_enter!==''){
    foreach ($accounts as $account) {
        if($current_account == $account->getAccountNo() && $old_pass == $account->getPassword()) {
            DAO::updatePassword($account->getAccountNo(), $new_pass);
            header('Location: atm.php');
        }
    }
}
?>
