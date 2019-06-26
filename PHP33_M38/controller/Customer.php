<?php

namespace Controller;
class Customer
{
    public function index()
    {
        $data = isset($_SESSION['customers']) ? $_SESSION['customers'] : [];

        $query = filter_input(INPUT_GET, 's');
        /**
         if ($query !== null && $query !== '') {
            $customers = [];
            foreach ($data as $item) {
                if ($item->getName() === $query) {
                    $customers[] = $item;
                }
            }
        } else {
            $customers = $data;
        }
        /* */

        if ($query !== null && $query !== '') {
            $customers = [];
            foreach ($data as $item) {
                preg_match_all('/'.$query.'/i', $item->getName(), $result);
                if (!empty($result[0])) {
                    $customers[] = $item;
                }
            }
        }
        else {
            $customers = $data;
        }

        include 'view/customer/index.php';
    }

    public function add()
    {
        if (!empty($_POST)) {
            $customerID = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
            $emailAddress = filter_input(INPUT_POST, 'email_address', FILTER_VALIDATE_EMAIL);
            $name = filter_input(INPUT_POST, 'name');
            $password = filter_input(INPUT_POST, 'password');
            $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);

            if ($customerID === false || $customerID === null ||
                $emailAddress === false || $emailAddress === null ||
                $name === false || $name === null ||
                $password === false || $password === null ||
                $phone === false || $phone === null
            ) {
                echo '<p>Invalid data!</p>';
            }
            else {
                // Init object customer and set data
                $customer = new \Model\Customer();
                $customer->setCustomerID($customerID);
                $customer->setEmailAddress($emailAddress);
                $customer->setName($name);
                $customer->setPassword($password);
                $customer->setPhone($phone);

                // Push customer data to session
                $data = isset($_SESSION['customers']) ? $_SESSION['customers'] : [];

                //$session = array();
                $data[] = $customer;    //array_push($data, $customer);

                $_SESSION['customers'] = $data;

                // Redirect to page index
                header('Location: index.php');
            }
        } else {
            include 'view/customer/add.php';
        }
    }

    public function delete()
    {
        $customerID = filter_input(INPUT_POST, 'customer_id');

        $data = isset($_SESSION['customers']) ? $_SESSION['customers'] : [];

        foreach ($data as $index => $item) {
            if ($item->getCustomerID() == $customerID) {
                unset($_SESSION['customers'][$index]);
                break;
            }
        }
        // Redirect to page index
        header('Location: index.php');
    }
}