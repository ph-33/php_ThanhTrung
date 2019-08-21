<?php

require 'util/common.php';
require 'util/cart.php';

require 'controller/home.php';
require 'controller/auth.php';

require 'model/database.php';
require 'model/customer_db.php';
require 'model/category_db.php';
require 'model/product_db.php';

session_start();

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

switch ($action) {
    case 'index':
        $controller = new Controller\Home();
        $controller->index();
        break;
    case 'login':
        $controller = new Controller\Auth();
        if (empty($_POST)) {
            $controller->show_form_login();
        } else {
            $controller->login();
        }
        break;
    case 'logout':
        $controller = new Controller\Auth();
        $controller->logout();
        break;
    case 'account':
        $controller = new Controller\Auth();
        $method = filter_input(INPUT_POST, 'customer');
        if ($method === null) {
            $controller->account_display();
            exit;
        }
        switch ($method) {
            case 'Edit':
                echo 'Edit';
                break;
            case 'Change Password':
                echo 'Change Password';
                break;
            case 'Change Address':
                echo 'Change Address';
                break;
        }
        break;
    case 'order_detail':
        $controller = new Controller\Auth();
        $controller->order_detail();
        break;
    case 'register':
        break;
    case 'cart':
        $method = filter_input(INPUT_POST, 'method');
        if ($method === null) {
            include 'view/cart.php';
            exit;
        }
        $product_id = filter_input(INPUT_POST, 'product_id');
        $quantity = filter_input(INPUT_POST, 'quantity');
        switch ($method) {
            case 'add':
                Cart::add($product_id, $quantity);
                break;
            case 'update':
                //$items = filter_input(INPUT_POST, 'items');
                $items = $_POST['items'];
                foreach ($items as $product_id => $quantity) {
                    Cart::update($product_id, $quantity);
                }
                break;
            case 'remove':
                Cart::remove($product_id);
                break;
            case 'destroy':
                Cart::destroy();
                break;
            default:
                throw new Exception('Bad Cart method!');
                break;
        }
        redirect('index.php?action=cart');
        break;
    default:
        throw new Exception('Bad action!');
        break;
}
