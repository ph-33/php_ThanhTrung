<?php
require('model/database.php');
require('model/account.php');
require('model/account_db.php');
require ('controller/encrypt.php');
require('controller/account_controller.php');

/*$str = 12345;
$encrypt = new Encrypt();

echo $encrypt->md5Encrypt($str);echo "<br>";
echo $encrypt->md5Encrypt($encrypt->md5Encrypt($str));echo "<br>";
echo $encrypt->sha1Encrypt($str);echo "<br>";
echo $encrypt->sha1Encrypt($encrypt->sha1Encrypt($str));echo "<br>";
echo $encrypt->encryptSHA1ToMD5($str);echo "<br>";
exit;*/

session_start();

$handle = new Controller();

if (isset($_REQUEST['action']) && $_REQUEST['action'] !== '') {
    $action = $_REQUEST['action'];
} else {
    $action = 'index';
}

if ($action === 'index' || $action === 'cancel') {
    $handle->index();
}
elseif ($action === 'login') {
    $handle->login();
}
elseif ($action === 'show_more') {
    $handle->showMore();
}
elseif ($action === 'show_less') {
    $handle->showLess();
}
elseif ($action === 'view_transfer') {
    $handle->transferView();
}
elseif ($action === 'transfer') {
    $handle->transfer();
}
elseif ($action === 'view_change_pass') {
    $handle->changePassView();
}
elseif ($action === 'change_pass') {
    $handle->changePass();
}
elseif ($action === 'logout') {
    $handle->logout();
}

?>