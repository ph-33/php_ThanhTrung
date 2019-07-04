<?php
    class Action
    {
        public function Login()
        {

            if (empty($_SESSION['user'])) {
                include('view/login.php');

                $account_no = filter_input(INPUT_POST, 'account_no');
                $password = filter_input(INPUT_POST, 'password');

                $accounts = DAO::getAccount();
                foreach ($accounts as $account) {
                    if ($account_no == $account->getAccountNo() && $password == $account->getPassword()) {
                        $_SESSION['user'] = $account_no;
                        header('Location: view/atm.php');
                    }
                }
            } else {
                header('Location: view/atm.php');
            }
        }
    }
?>
