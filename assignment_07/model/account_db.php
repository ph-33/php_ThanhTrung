<?php

class AccountDB
{
    public static function getAccount() {
        $db = Database::connectDB();

        $sql = 'SELECT * FROM account';

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $accounts = array();
        foreach ($rows as $row) {
            $account = new Account($row['accountNo'], $row['ownerName'], $row['amount'], $row['accountType'], $row['password']);
            $accounts[] = $account;
        }
        return $accounts;
    }

    public static function getAccountDetail($accountNo) {
        $db = Database::connectDB();

        $sql = 'SELECT * FROM account WHERE accountNo = :account_no';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':account_no', $accountNo);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $row = $stmt->fetch();
            $account = new Account($row['accountNo'], $row['ownerName'], $row['amount'], $row['accountType'], $row['password']);

        } else {
            $account = 'Not Found';
        }
        $stmt->closeCursor();

        return $account;
    }

    public static function checkLogin($accountNo, $password) {
        $db = Database::connectDB();

        $sql = 'SELECT * FROM account WHERE accountNo = :account_no AND password = :password';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':account_no', $accountNo);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count > 0) {
            $row = $stmt->fetch();
            $account = new Account($row['accountNo'], $row['ownerName'], $row['amount'], $row['accountType'], $row['password']);

        } else {
            $account = 'Not Match';
        }

        $stmt->closeCursor();

        return $account;
    }

    public static function updatePassword($accountNo, $password) {
        $db = Database::connectDB();

        $sql = 'UPDATE account SET password = :password WHERE accountNo = :accountNo';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':accountNo', $accountNo);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function checkTransfer() {

    }

    public static function transfer($accountSend, $accountReceive, $amount) {
        $db = Database::connectDB();

        /* $sql = 'SET AUTOCOMMIT =0;
                 START TRANSACTION;
                 BEGIN;
                 UPDATE account SET Amount = amount - :amount WHERE accountNo = :accountSend;
                 UPDATE account SET Amount = amount + :amount WHERE accountNo = :accountReceive;
                 COMMIT;
                 ROLLBACK;';
         $stmt = $db->prepare($sql);
         $stmt->bindValue(':accountSend', $accountSend);
         $stmt->bindValue(':accountReceive', $accountReceive);
         $stmt->bindValue(':amount', $amount);
         $stmt->execute();
         $stmt->closeCursor();*/
        try {
            $db->beginTransaction();

            $sql = 'UPDATE account SET Amount = amount - :amount WHERE accountNo = :accountSend;
                    UPDATE account SET Amount = amount + :amount WHERE accountNo = :accountReceive;';
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':accountSend', $accountSend);
            $stmt->bindValue(':accountReceive', $accountReceive);
            $stmt->bindValue(':amount', $amount);
            $stmt->execute();
            $stmt->closeCursor();

            $db->commit();
        } catch (PDOException $e) {
            echo $e->getMessage();
            $db->rollBack();
        }
    }
}

?>