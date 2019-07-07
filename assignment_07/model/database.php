<?php
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=bankdb;port=3306';
    private static $username = 'AdminMySQL';
    private static $password = 'AdminMySQL';
    private static $db;

    public function connectDB() {
        if(!isset(self::$db)) {
            try{
                self::$db = new PDO(self::$dsn, self::$username, self::$password);
            }
            catch (PDOException $e){
                $error_message = $e->getMessage();
                echo 'Error: '.$error_message;
                exit();
            }
        }
        return self::$db;
    }
}
?>