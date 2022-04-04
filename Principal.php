<?php
    class Principal{
        private $id;
        private $fname;
        private $lname;
        private $email;
        public function __construct($id, $f,$l,$em)
        {
            $this->ID=$id;
            $this->fname=$f;
            $this->lname=$l;
            $this->email=$em;
        }
        public function getID(){
            return $this->ID;
        }
        public function Fees(){
            
        }

    }
?>