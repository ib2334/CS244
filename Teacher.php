	<?php
	class teacher
	

	session_start();
	require_once"user.php";
	require "userInfo.php";
	class teacher extends userInfo implements user
	{
	    private $id;
	    private $teacherfName;
	    private $teacherlName;
	    private $phone;
	    private $address;
	    private $email;
	    private $password;
	
	    public function _construct($id, $fname, $lname, $em, $pass, $add, $ph)
	    {
	        $this->id=$id;
	        $this->teacherfName=$fname;
	        $this->teacherlName=$lname;
	        $this->phone=$ph;
	        $this->address=$add;
	        $this->email=$em;
	        $this->password=$pass;
	    }
	    public function getid()
	    {
	        return $this->id;
	    }
        
        public function getfname()
        {
          return $this->teacherfname;
        }
        public function getlname()
        {
         return $this->teacherlname; 
        }
        public function getph()
        {
        return $this->phone;
        }
        public function getadd()
        {
        return $this->address;
        }
        public function getem()
        {
        return $this->email;
        }
        public function getpass()
        {
        return $this->password;
         }
    function __destruct()
    {
        
    }

	    public function showprofile()
	    {
	        echo $this->getid();
	        echo"<hr>";
	        echo $this->getfname();
	        echo"<hr>";
	        echo $this->getlname();
	        echo""<hr>;
	        echo $this->getph();
	        echo"<hr>";
	        echo $this->getadd();
	        echo"<hr>";
	        echo $this->getem();
	        echo"<hr>";
	        echo $this->getpass();
	        echo"<hr>";
	    }
	}
	$id_value= $session['id'];
	$filename= "teacher.txt";
	$file=fopen($filename, 'a+') or die('file inaccesible');
	$seperator="|";
	while(!feof ($file))
	{
	    $line=fgets($file))
	    {
	        $Arrline=explode($seperator, $line);
	        if($Arrline[0]==$id_value)
	        {
	            $tch=new teacher ($Arrline[0],$Arrline[1],$Arrline[2],$Arrline[3],$Arrline[4],$Arrline[5],$Arrline[6];
	        }
	    }
	    fclose($file);
	    $tch->showfile();
	?>
