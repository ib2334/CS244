<?php
    session_start();
    require_once "User.php";
    require "UserInfo.php";
    class Student extends UserInfo implements User{ 
        private $phone;
        private $address;
        private $busid;
        public function __construct($ph, $ad, $bid)
        {
            $this->phone=$ph;
            $this->address=$ad;
            $this->busid=$bid;
        }
        public function getadd(){
            return $this->address;
        }
        public function getph(){
            return $this->phone;
        }
        public function getbid(){
            return $this->busid;
        }
        public function __destruct()
        {
        }
        public function ShowProfile(){
            $this->getID();
            $this->getfName();
            $this->getlName();
            $this->getem();
            $this->getph();
            $this->getadd();
            $this->getbid();
        }
    }
    $var_value = $_SESSION['ID'];
    echo $var_value;
?>