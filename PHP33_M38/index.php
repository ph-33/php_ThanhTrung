<?php

require 'controller/Customer.php';
require 'model/Customer.php';

session_start();

$action = 'index';
$customerController = new \Controller\Customer();

if (isset($_REQUEST['action']) && $_REQUEST['action'] !== '') {
    $action = $_REQUEST['action'];
}
if ($action === 'index') {
    $customerController->index();
} else if ($action === 'add') {
    $customerController->add();
} elseif ($action === 'delete') {
    $customerController->delete();
}