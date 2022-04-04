<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="description" content="School Management System">
      <title>Home</title>
  </head>
  <body>
    <?php
      class Login{
        private $ID;
        private $Email;
        private $user_pass;
        public function __construct($id,$em,$pass)
        {
          $this->ID=$id;
          $this->Email=$em;
          $this->user_pass=$pass;
        }
        public function getid(){
          return $this->ID;
        }
        public function getem(){
          return $this->Email;
        }
        public function getpas(){
          return $this->user_pass;
        }
        public function sess(){
          session_start();
        }
      }
    ?>
    <?php
      include_once "index.php";
      $id = $_POST["ID"];
      $pass = $_POST["pass"];
      $email = $_POST["email"];
      $log=new Login($id,$email,$pass);
      $log->sess();
      setcookie($id, "" , time() - 3600);
    ?>
  </body>
</html>