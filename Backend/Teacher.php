<?php
	session_start();
	require_once "User.php";
	require "UserInfo.php";
	class Teacher extends UserInfo implements User
	{
	    private $phone;
	    private $address;
	
	    public function _construct($add, $ph)
	    {
	        $this->phone=$ph;
	        $this->address=$add;
	    }
        
        public function getph()
        {
        return $this->phone;
        }
        public function getadd()
        {
        return $this->address;
        }
    function __destruct()
    {
        
    }

	    public function ShowProfile()
	    {
	        echo $this->getID();
	        echo"<hr>";
	        echo $this->getfName();
	        echo"<hr>";
	        echo $this->getlName();
	        echo"<hr>";
	        echo $this->getph();
	        echo"<hr>";
	        echo $this->getadd();
	        echo"<hr>";
	        echo $this->getem();
	        echo"<hr>";
	    }
	}
	$id_value= $_SESSION['ID'];
	$filename= '../Invoices/Teacher.txt';
	$file=fopen($filename, 'a+') or die('File Inaccesible');
	$seperator="|";
	while(!feof ($file))
	{
	    $line=fgets($file);
	    $Arrline=explode($seperator, $line);
	    if($Arrline[0]==$id_value)
	    {
	        $tch=new Teacher ($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5],$Arrline[6]);
	    }
    }
    fclose($file);
	$tch->ShowProfile();
?>