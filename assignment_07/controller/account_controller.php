<?php

class Controller {
    public function index(){
        if (empty($_SESSION['user'])) {
            include('view/login.php');
        }
        else {
            $this->login();
        }
    }

    public function login() {
        if (empty($_SESSION['user'])) {
            $account_no = filter_input(INPUT_POST, 'account_no');
            $password = filter_input(INPUT_POST, 'password');

            $encrypt = new Encrypt();
            $encryptPass = $encrypt->md5Encrypt($encrypt->md5Encrypt($password));

            $account = AccountDB::checkLogin($account_no, $encryptPass);

            if ($account === 'Not Match') {
                $message = 'Invalid Account No or Password.';
                include('view/login.php');

            } else {
                $_SESSION['user'] = $account_no;
                $owner_name = $account->getOwnerName();
                include('view/atm.php');
            }
        } else {
            $account = AccountDB::getAccountDetail($_SESSION['user']);
            $owner_name = $account->getOwnerName();
            include('view/atm.php');
        }
    }

    public function showMore() {
        $account = AccountDB::getAccountDetail($_SESSION['user']);
        $owner_name = $account->getOwnerName();
        $amount = $account->getAmount();
        $account_type = $account->getAccountType();
        include ('view/viewAccount.php');
    }

    public function showLess() {
        $account = AccountDB::getAccountDetail($_SESSION['user']);
        $owner_name = $account->getOwnerName();
        include ('view/atm.php');
    }

    public function transferView() {
        if (!empty($_SESSION['user'])) {
            $accounts = AccountDB::getAccount();
            $account = AccountDB::getAccountDetail($_SESSION['user']);

            $account_send = $account->getAccountNo();
            $amount = $account->getAmount();

            include('view/transfer.php');
        }
        else {
            header('Location: index.php');
        }
    }

    public function transfer() {
        if (!empty($_SESSION['user'])) {
            $account_sender = $_SESSION['user'];
            $account_receiver = filter_input(INPUT_POST, 'account_receiver');
            $amount_transfer = filter_input(INPUT_POST, 'amount_transfer', FILTER_VALIDATE_INT);

            $sender = AccountDB::getAccountDetail($account_sender);
            $receiver = AccountDB::getAccountDetail($account_receiver);

            $amount_sender = $sender->getAmount();

            if ($sender !== 'Not Found' && $receiver !== 'Not Found' && $amount_transfer <= $amount_sender) {
                AccountDB::transfer($account_sender, $account_receiver, $amount_transfer);
                $owner_name = $sender->getOwnerName();
                $amount = $sender->getAmount() - $amount_transfer;
                $account_type = $sender->getAccountType();

                $message = 'Transfer Successfully.';
                include('view/viewAccount.php');
            } else {
                $message = 'Some information incorrect.';
                //$this->transferView();

                $accounts = AccountDB::getAccount();
                $account = AccountDB::getAccountDetail($_SESSION['user']);
                $account_send = $account->getAccountNo();
                $amount = $account->getAmount();
                include('view/transfer.php');
            }
        }
        else {
            header('Location: index.php');
        }
    }

    public function changePassView() {
        if (!empty($_SESSION['user'])) {
            include('view/changePassword.php');
        }
        else {
            header('Location: index.php');
        }
    }

    public function changePass() {
        if (!empty($_SESSION['user'])) {
            $old_pass = filter_input(INPUT_POST, 'old_pass');
            $new_pass = filter_input(INPUT_POST, 'new_pass');
            $re_enter  = filter_input(INPUT_POST, 're_enter');

            $account = AccountDB::getAccountDetail($_SESSION['user']);
            $current_pass = $account->getPassword();


            $encrypt = new Encrypt();
            $encrypt_old_pass = $encrypt->md5Encrypt($encrypt->md5Encrypt($old_pass));
            $encrypt_new_pass = $encrypt->md5Encrypt($encrypt->md5Encrypt($new_pass));
            $encrypt_re_enter = $encrypt->md5Encrypt($encrypt->md5Encrypt($re_enter));

            if($account!=='Not Found') {
                if($encrypt_old_pass == $current_pass) {
                    if($encrypt_new_pass == $encrypt_re_enter) {
                        AccountDB::updatePassword($account->getAccountNo(), $encrypt_new_pass);

                        $message = 'Change password successfully.';

                        $account = AccountDB::getAccountDetail($_SESSION['user']);
                        $owner_name = $account->getOwnerName();
                        include ('view/atm.php');
                    }
                    else {
                        $message = 'Re-enter the password does\'t match.';
                        include ('view/changePassword.php');
                    }

                }
                else {
                    $message = 'The old password is incorrect.';
                    include ('view/changePassword.php');
                }
            }
            else {
                $message = 'Your account could not be found';
                include ('index.php');
            }
        }
        else {
            $message = 'Your account could not be found';
            header('Location: index.php');
        }
    }

    public function logout() {
        unset($_SESSION['user']);
        header('Location: index.php');
    }
}

?>
