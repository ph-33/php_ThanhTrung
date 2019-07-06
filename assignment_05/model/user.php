<?php

class User
{
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