<?php session_start(); ?>
<?php
    require "login.php";
    $_POST["ID"]=$_POST["pass"]=$_POST["email"]="";
    $_SESSION['ID']=$_POST["ID"];
    $_SESSION['pass']=$_POST["pass"];
    $_SESSION['email']=$_POST["email"];
    $_SESSION['IDe']=$_SESSION['Ee']= $_SESSION['Pe']="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_SESSION['ID'])) {
            $_SESSION['IDe'] = "ID is required";
        } else {
            test_input($_SESSION['ID']);
            if (!filter_var($_SESSION['ID'], FILTER_VALIDATE_INT)) {
                $_SESSION['IDe'] = "Only numbers allowed";
            }
        }

        if (empty($_SESSION['email'])) {
            $_SESSION['Ee'] = "Email is required";
           
        } else {
            test_input($_SESSION['email']);
            if (!filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['Ee'] = "Invalid email format";
 
            }
        }

        if (empty($_SESSION['pass'])) {
            $_SESSION['Pe'] = "Password is required";
            
        } else {
            test_input($_SESSION['pass']);
            
        }
        
    }
    session_reset();
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>