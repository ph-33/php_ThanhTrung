<?php

namespace Model;

class CustomerDB
{
    public static function is_valid_user($email, $password)
    {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT *
        FROM customers
        WHERE emailAddress = :email
        AND password = :password
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->bindValue(':password', $password);
            $statement->execute();
            $is_valid = $statement->rowCount() > 0;
            $statement->closeCursor();
            return $is_valid;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_customer_by_email($email)
    {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * FROM customers
        WHERE emailAddress = :email
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $customer = $statement->fetch(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $customer;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_address($customerID) {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * 
        FROM addresses 
        WHERE customerID = :customerID
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $customerID);
            $statement->execute();
            $addresses = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $addresses;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_order($customerID) {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * 
        FROM orders 
        WHERE customerID = :customerID
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':customerID', $customerID);
            $statement->execute();
            $orders = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $orders;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_order_item($orderID) {
        $db = \Database::getDB();
        $query = <<<SQL
        SELECT * 
        FROM orderitems 
        WHERE orderID = :orderID
SQL;
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':orderID', $orderID);
            $statement->execute();
            $orders = $statement->fetchAll(\PDO::FETCH_ASSOC);
            $statement->closeCursor();
            return $orders;
        } catch (\PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}