<?php
    class Student extends User{
        private $ID;
        private $pass;
        private $fname;
        private $lname;
        private $email;
        private $phone;
        private $address;
        private $busid;
        public function __construct($ID, $f, $l, $ph, $ad, $bid, $ps, $em)
        {
            $this->ID=$ID;
            $this->fname=$f;
            $this->lname=$l;
            $this->pass=$ps;
            $this->phone=$ph;
            $this->address=$ad;
            $this->busid=$bid;
            $this->email=$em;
        }
        public function getID(){
            return $this->ID;
        }
        public function getfName(){
            return $this->fname;
        }
        public function getlName(){
            return $this->lname;
        }
        public function fullname(){
            $name=$this->fname. $this->lname;
            return $name;
        }
        public function getpass(){
            return $this->pass;
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
        public function getem(){
            return $this->email;
        }
        public function __destruct()
        {
        }
        public function ShowProfile(){
            $this->getpass();
            $this->getadd();
            $this->getph();
            $this->getbid();
            $this->getem();
        }
    }
?>
Student