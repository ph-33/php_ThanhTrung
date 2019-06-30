<?php
require ('controller/user_controller.php');
require ('model/database.php');
require ('model/user_db.php');

$userControl = new Actions();
$userControl->userList();
?>