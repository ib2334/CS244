<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style.css">
<html>
    <body>
        <h1>Login</h1>
        <?php
            $IDErr = $emailErr = $passErr = "";
            $ID = $email = $pass = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["ID"])) {
                    $IDErr = "ID is required";
                } else {
                    $ID = test_input($_POST["ID"]);
                    if (!filter_var($ID, FILTER_VALIDATE_INT)) {
                        $IDErr = "Only numbers allowed";
                    }
                }
                if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                } else {
                    $email = test_input($_POST["email"]);
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }
                }
                if (empty($_POST["pass"])) {
                    $passErr = "Password is required";
                } else {
                    $pass = test_input($_POST["pass"]);
                }
            }
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        ID: <input type="text" name="ID" value="<?php echo $ID;?>">
        <span class="error">* <?php echo $IDErr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Password: <input type="password" name="pass" value="<?php echo $pass;?>">
        <span class="error"><?php echo $passErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Login" > <br>
        </form>
    </body>
</html>