<?php

class Actions
{
    public  function  userList() {
        $str = filter_input(INPUT_GET, 's');
        $email = filter_input(INPUT_POST, 'email');

        if ($str!==NULL && $str!=='') {
            $result = UserDB::searchUser($str);
        }
        elseif ($email!==NULL && $email!=='') {
            UserDB::deleteUser($email);
            header('Location: index.php');
        }
        else
        {
            $result = UserDB::getUser();
        }

        include('view/user_list.php');
    }

    public function edit() {
        $email = filter_input(INPUT_POST, 'email');
        $fName = filter_input(INPUT_POST, 'fName');
        $lName = filter_input(INPUT_POST, 'lName');

        if(isset($_POST["save"])) {

            UserDB::updateUser($email, $fName, $lName);
            header('Location: ../index.php');
        }

        if(isset($_POST["cancel"])) {
            header('Location: ../index.php');
        }
    }

}

?>