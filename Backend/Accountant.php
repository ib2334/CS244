<?php
    session_start();
    include "TopNav.html";
    require_once "User.php";
    require "UserInfo.php";
    class Accountant extends UserInfo implements User{
        public function ShowProfile(){
            echo $this->getID();
            echo "<hr>";
            echo $this->getfName();
            echo "<hr>";
            echo $this->getlName();
            echo "<hr>";
            echo $this->getem();
            echo "<hr>";
        }
    }
    $id_value = $_SESSION['ID'];
    $filename='../Invoices/Accountant.txt';
    $file=fopen($filename, 'a+') or die ('File Inaccesible');
    $seperator="|";
    while(!feof($file)){
        $line=fgets($file);
        $Arrline=explode($seperator,$line);
        if($Arrline[0]==$id_value){
            $pr=new Accountant($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4]);
        }
    }
    fclose($file);
    $pr->ShowProfile();
?>