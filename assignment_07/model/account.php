<?php
class Account {
    private $accountNo, $ownerName, $amount, $accountType, $password;

    public function __construct($accountNo, $ownerName, $amount, $accountType, $password) {
        $this->accountNo = $accountNo;
        $this->ownerName = $ownerName;
        $this->amount = $amount;
        $this->accountType = $accountType;
        $this->password = $password;
    }

    public function getAccountNo()
    {
        return $this->accountNo;
    }

    public function setAccountNo($value)
    {
        $this->accountNo = $value;
    }

    public function getOwnerName()
    {
        return $this->ownerName;
    }

    public function setOwnerName($value)
    {
        $this->ownerName = $value;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setAmount($value)
    {
        $this->amount = $value;
    }

    public function getAccountType()
    {
        return $this->accountType;
    }

    public function setAccountType($value)
    {
        $this->accountType = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }
}
?>