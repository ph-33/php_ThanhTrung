<?php

class Database
{
    private static $dsn = 'mysql:host=localhost;dbname=assignment_05;port=3306';
    private static $username = 'AdminMySQL';
    private static $password = 'AdminMySQL';
    private static $db;

    public static function dbConnect()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include ('view/database_error.php');
                //echo 'Error: ' . $error_message;
                exit();
            }
        }
        return self::$db;
    }
}

?>