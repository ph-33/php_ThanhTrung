<?php
require('model/database.php');
require('model/user.php');
require('model/user_db.php');
require('controller/user_controller.php');

$handle = new Controller();

if (isset($_REQUEST['action']) && $_REQUEST['action'] !== '') {
    $action = $_REQUEST['action'];
}
else {
    $action = 'index';
}

if ($action==='index' || $action==='cancel') {
    $handle->userList();
}
elseif ($action==='search') {
    $handle->search();

}
elseif ($action==='edit') {
    $handle->editUser();
}
elseif ($action==='update') {
    $handle->updateUser();
}
elseif ($action==='delete') {
    $handle->deleteUser();
}
?>