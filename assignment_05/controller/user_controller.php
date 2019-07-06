<?php

class Controller
{
    public function userList() {
        $users = UserDB::getUser();
        include('view/user_list.php');
    }

    public function search() {
        $str = filter_input(INPUT_GET, 's');

        if ($str !== NULL && $str !== '') {
            $users = UserDB::searchUser($str);
        }
        else {
            $users = UserDB::getUser();
        }

        include('view/user_list.php');
    }

    public function editUser() {
        $email = filter_input(INPUT_POST, 'email');

        $user = UserDB::getUserDetail($email);

        if ($user!==0) {
            include ('view/edit_user.php');
        }
        else {
            $this->userList();
            $this->errorMessage();
        }
    }

    public function updateUser() {
        $email = filter_input(INPUT_POST, 'email');
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');

        UserDB::updateUser($email, $fName, $lName);
        header('Location: index.php');
    }

    public function deleteUser() {
        $email = filter_input(INPUT_POST, 'email');

        $user = UserDB::getUserDetail($email);

        if ($user!==0) {
            UserDB::deleteUser($email);
            header('Location: index.php');
        }
        else {
            $this->userList();
            $this->errorMessage();
        }


    }

    public function errorMessage() {
        echo '<b style="color: red">Does not exist user. </b>';
    }
}

?>