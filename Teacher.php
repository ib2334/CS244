<?php
class teacher
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

}
?>