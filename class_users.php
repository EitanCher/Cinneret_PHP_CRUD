<?php

class User {
    private $userName;
    private $password;
    private $validUntil;

    function __construct($uname, $pass) {
        $this->userName = $uname;
        $this->password = $pass;

        // $currentDate = new DateTime(); // Get the current date and time
        // $this->validUntil = date('Y-m-d', strtotime('+one year', $currentDate)); // Set future date to one year from now

        $this->validUntil = date('Y-m-d', strtotime('+1 year'));    // Add 1 year from --now--
    }

    public function getUserName(){ return $this->userName; }
    public function getPassword(){ return $this->password; }
    public function getValidUntil(){ return $this->validUntil; }

    // public function IsValid($u,$p){
    //     if(($u==$this->uname)&&($p==$this->pass))
    //         return true;
    //     return false;
    // }
}