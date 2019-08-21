<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=guitar_shop';
    private static $username = 'user';
    private static $password = '1235';
    private static $db;

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                //include('view/errors/database.php');
                echo 'Error: '.$error_message;
                exit();
            }
        }
        return self::$db;
    }
}