<?php session_start(); ?>
<?php
    require "login.php";
    $ID = $_POST["ID"];
    $_SESSION['ID']=$ID;
    $pass = $_POST["pass"];
    $_SESSION['pass']=$pass;
    $email = $_POST["email"];
    $_SESSION['email']=$email;
    $IDErr = $emailErr = $passErr = "";
    $_SESSION['IDe']= $IDErr;
    $_SESSION['Ee']= $emailErr;
    $_SESSION['Pe']= $passErr;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["ID"])) {
            $IDErr = "ID is required";
            session_reset();
        } else {
            $ID = test_input($_POST["ID"]);
            if (!filter_var($ID, FILTER_VALIDATE_INT)) {
                $IDErr = "Only numbers allowed";
                session_reset();
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            session_reset();
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
                session_reset();
            }
        }
        if (empty($_POST["pass"])) {
            $passErr = "Password is required";
            session_reset();
        } else {
            $pass = test_input($_POST["pass"]);
            session_reset();
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>