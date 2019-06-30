<?php

class User {
    private $email, $fName, $lName;

    public function __construct($email, $fName, $lName)
    {
        $this->email = $email;
        $this->fName = $fName;
        $this->lName = $lName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        $this->email = $value;
    }

    public function getFName()
    {
        return $this->fName;
    }

    public function setFName($value)
    {
        $this->fName = $value;
    }

    public function getLName()
    {
        return $this->lName;
    }

    public function setLName($value)
    {
        $this->lName = $value;
    }


}

class UserDB {
    public static function getUser() {
        $db = ConnectDB::dbConnect();

        $query = "SELECT * FROM user";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $users = array();
        foreach ($rows as $row) {
            $user = new User($row['Email'], $row['FirstName'], $row['LastName']);
            $users[] = $user;
        }
        return $users;

    }

    public static function getUserDetail($email) {
        $db = ConnectDB::dbConnect();

        $query = "SELECT * FROM user WHERE Email = :email";

        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $email,);
        $stmt->execute();
        $row = $stmt->fetch();
        $user = new User($row['Email'], $row['FirstName'], $row['LastName']);
        return $user;

    }

    public static function searchUser($txt) {
        $db = ConnectDB::dbConnect();

        $query = "SELECT * FROM user WHERE Email LIKE :txt OR FirstName LIKE :txt OR LastName LIKE :txt";
        //$query = "SELECT * FROM user WHERE Email LIKE ? OR FirstName LIKE ? OR LastName LIKE ?";
        //$query = "SELECT * FROM user WHERE Email LIKE \"'%\".:txt.\"%'\" OR FirstName LIKE \"'%\".:txt.\"%'\" OR LastName LIKE \"'%\".:txt.\"%'\"";

        $stmt = $db->prepare($query);
        $stmt->bindValue(':txt', '%' . $txt . '%', PDO::PARAM_STR);
        //$stmt->bindValue(1,"%$txt%", PDO::PARAM_STR);
        //$stmt->bindValue(':txt', $txt);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $users = array();
        foreach ($rows as $row) {
            $user = new User($row['Email'], $row['FirstName'], $row['LastName']);
            $users[] = $user;
        }
        return $users;
    }

    public static function updateUser($email, $fName, $lName) {
        $db = ConnectDB::dbConnect();

        $query = "UPDATE user SET FirstName=:fName, LastName=:lName WHERE Email=:email";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':fName', $fName);
        $stmt->bindValue(':lName', $lName);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function deleteUser($email) {
        $db = ConnectDB::dbConnect();

        $query = 'DELETE FROM user WHERE Email = :email';

        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
?>