<?php
require ('../controller/account_controller.php');
require ('../model/database.php');
require ('../model/account.php');
require ('../model/account_db.php');

session_start();

$accounts = DAO::getAccount();

if(empty($_SESSION['user'])) {
    header('Location: ../index.php');
}
else {
    foreach ($accounts as $account) {
        if($_SESSION['user'] == $account->getAccountNo()) {
            $account_no = $account->getAccountNo();
            $owner_name = $account->getOwnerName();
            $amount = $account->getAmount();
            $account_type = $account->getAccountType();
        }
    }

    if(isset($_POST["btn_transfer"])) {
        header('Location: transfer.php');
    }

    if(isset($_POST["btn_change_pass"])) {
        header('Location: changePassword.php');
    }

    if(isset($_POST["btn_logout"])) {
        unset($_SESSION['user']);
        header('Location: ../index.php');
    }

    if(isset($_POST["cancel"])) {
        header('Location: atm.php');
    }
}
?>