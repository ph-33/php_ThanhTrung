<?php

namespace Controller;

use Model\CustomerDB;

class Auth
{
    /**
     * Check customer has login
     * @return bool
     */
    private function check_login()
    {
        return isset($_SESSION['customer']);
    }

    public function show_form_login()
    {
        if ($this->check_login()) {
            redirect('index.php');
        }
        include 'view/login.php';
    }

    public function login()
    {
        if ($this->check_login()) {
            redirect('index.php');
        }
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $errors = array();
        if ($email === null || $email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Invalid email';
        }
        if ($password === null || $password === '') {
            $errors['password'] = 'Password is required.';
        } elseif (strlen($password) < 6) {
            $errors['password'] = 'Password is short.';
        }

        if (empty($errors)) {
            if (!CustomerDB::is_valid_user($email, sha1($password))) {
                $errors['login'] = 'Email or password invalid.';
            } else {
                $customer = CustomerDB::get_customer_by_email($email);
                $_SESSION['customer'] = $customer;
                redirect('index.php');
            }
        }

        include 'view/login.php';
    }

    public function logout()
    {
        unset($_SESSION['customer']);
        redirect('index.php?action=login');
    }

    public function check_address() {
        $customerID = $_SESSION['customer']['customerID'];
        $addresses = CustomerDB::get_address($customerID);

    }
//
//    public function account() {
//        $customerID = $_SESSION['customer']['customerID'];
//        //print_r($_SESSION['customer']); exit;
//        $addresses = CustomerDB::get_address($customerID);
//        $orders = CustomerDB::get_order($customerID);
//
//        foreach ($orders as $order) {
//            //get address
//            foreach ($addresses as $address) {
//                if($address['addressID'] == $order['shipAddressID']) {
//                    $shipAddress = $address['line1'] . ' - ' . $address['city'] . ' - ' . $address['state'];
//                }
//                if($address['addressID'] == $order['billingAddressID']) {
//                    $billingAddress =  $address['line1'] . ' - ' . $address['city'] . ' - ' . $address['state'];
//                }
//            }
//            $addr[$order['orderID']] = array('shipAddress'=>$shipAddress, 'billingAddress'=>$billingAddress);
//
//            //get amount
//            $amount_order = 0;
//            $items = CustomerDB::get_order_item($order['orderID']);
//            foreach ($items as $item) {
//                $amount_order = $amount_order + $item['itemPrice'] - ($item['itemPrice'] * $item['discountAmount'] / 100);
//            }
//            // total = order amount + ship amount + tax amount
//            $total = $amount_order + $order['shipAmount'] + $order['taxAmount'];
//            $totals[$order['orderID']] = $total;
//        }
//
//        //$result = array('address'=>$addr, 'amount'=>$totals);
//
//        //return $result;
//
//        /*foreach ($orders as $order) {
//            echo $addr[$order['orderID']]['shipAddress'];
//            echo $addr[$order['orderID']]['billingAddress'];
//            echo '<br>';
//        }*/
//        /*foreach ($orders as $order) {
//            echo $totals[$order['orderID']];
//            echo '<br>';
//        }*/
//        /*var_dump($totals);
//        echo array_sum($totals); echo '<br>';
//        exit;*/
//    }

    public function account_display() {
        $customerID = $_SESSION['customer']['customerID'];
        //print_r($_SESSION['customer']); exit;
        $addresses = CustomerDB::get_address($customerID);
        $orders = CustomerDB::get_order($customerID);

        foreach ($orders as $order) {
            /**
             * get address
             */
            foreach ($addresses as $address) {
                if($address['addressID'] == $order['shipAddressID']) {
                    $shipAddress = $address['line1'] . ' - ' . $address['city'] . ' - ' . $address['state'];
                }
                if($address['addressID'] == $order['billingAddressID']) {
                    $billingAddress =  $address['line1'] . ' - ' . $address['city'] . ' - ' . $address['state'];
                }
            }
            $addr[$order['orderID']] = array('shipAddress'=>$shipAddress, 'billingAddress'=>$billingAddress);

            /**
             * get amount
             */
            $amount_order = 0;
            $items = CustomerDB::get_order_item($order['orderID']);
            foreach ($items as $item) {
                $amount_order = $amount_order + $item['itemPrice'] - ($item['itemPrice'] * $item['discountAmount'] / 100);
            }
            // total = order amount + ship amount + tax amount
            $total = $amount_order + $order['shipAmount'] + $order['taxAmount'];
            $totals[$order['orderID']] = $total;
        }
        //$result = $this->account();
        include ('view/user.php');
    }

    public function order_detail() {
        $order_id = filter_input(INPUT_SERVER, 'order_id');
        echo $order_id;
        include ('view/order_detail.php');
    }
}
