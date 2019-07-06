<?php

class UserDB
{
    public static function getUser()
    {
        $db = Database::dbConnect();

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

    public static function getUserDetail($email)
    {
        $db = Database::dbConnect();

        $query = "SELECT * FROM user WHERE Email = :email";

        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $email,);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count>0) {
            $row = $stmt->fetch();
            $user = new User($row['Email'], $row['FirstName'], $row['LastName']);

        }
        else {
            $user = 0;
        }
        return $user;
    }

    public static function searchUser($txt)
    {
        $db = Database::dbConnect();

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

    public static function updateUser($email, $fName, $lName)
    {
        $db = Database::dbConnect();

        $query = "UPDATE user SET FirstName=:fName, LastName=:lName WHERE Email=:email";

        $stmt = $db->prepare($query);

        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':fName', $fName);
        $stmt->bindValue(':lName', $lName);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function deleteUser($email)
    {
        $db = Database::dbConnect();

        $query = 'DELETE FROM user WHERE Email = :email';

        $stmt = $db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $stmt->closeCursor();
    }
}

?>