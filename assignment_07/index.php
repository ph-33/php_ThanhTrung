<?php
require ('controller/account_controller.php');
require ('model/database.php');
require ('model/account.php');
require ('model/account_db.php');

session_start();

$handle = new Action();


/*$action = filter_input(INPUT_SERVER, 'action');
if ($action==NULL) {
    $action = 'login';
}*/

if (isset($_REQUEST['action']) && $_REQUEST['action'] !== '') {
    $action = $_REQUEST['action'];
}
else {
    $action = 'login';
}

if ($action=='login') {
    $handle->Login();
}/*
elseif ($action=='transfer') {
    $handle->Transfer();
}
elseif ($action=='change_pass') {
    $handle->ChangePass();
}
elseif ($action=='logout') {
    $handle->Logout();
}
elseif ($action=='cancel') {
    $handle->Cancel();
}*/
?>