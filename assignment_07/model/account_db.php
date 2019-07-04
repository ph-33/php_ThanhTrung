<?php
class DAO {
    public static function getAccount() {
        $db = Connect::connectDB();

        $sql = 'SELECT * FROM account';

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        $accounts = array();
        foreach ($rows as $row) {
            $account = new Account($row['AccountNo'], $row['OwnerName'], $row['Amount'], $row['AccountType'], $row['Password']);
            $accounts[] = $account;
        }
        return $accounts;
    }

    public static function updatePassword($accountNo, $password){
        $db = Connect::connectDB();

        $sql = 'UPDATE account SET Password = :password WHERE AccountNo = :accountNo';

        $stmt = $db->prepare($sql);
        $stmt->bindValue(':accountNo', $accountNo);
        $stmt->bindValue(':password', $password);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function transfer($accountSend, $accountReceive, $amount) {

        $db = Connect::connectDB();

        $sql = 'SET AUTOCOMMIT =0;
                START TRANSACTION;
                BEGIN;
                UPDATE account SET Amount = Amount - :amount WHERE AccountNo = :accountSend;
                UPDATE account SET Amount = Amount + :amount WHERE AccountNo = :accountReceive;
                COMMIT;
                ROLLBACK;';
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':accountSend', $accountSend);
        $stmt->bindValue(':accountReceive', $accountReceive);
        $stmt->bindValue(':amount', $amount);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
?>