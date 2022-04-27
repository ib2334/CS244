<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style1.css">
<html>
    <body>
        <?php
            $red=true;
            $ID=$Email=$Pass="";
            $IDerr=$Emailerr=$Passerr="";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST['ID'])) {
                    $IDerr = "ID is required";
                }else {
                    $ID=test_input($_POST['ID']);
                    if (!filter_var($ID, FILTER_VALIDATE_INT)) {
                       $IDerr = "Only numbers allowed";
                    }
                }
                if (empty($_POST['email'])) {
                   $Emailerr = "Email is required";
                
                } else {
                    $Email=test_input($_POST['email']);
                    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                        $Emailerr = "Invalid email format";
        
                    }
                }

                if (empty($_POST['pass'])) {
                    $Passerr = "Password is required";
                    
                } else {
                    $Pass=test_input($_POST['pass']);
                }
                if($IDerr=="" && $Emailerr=="" && $Passerr==""){
                    $red=true;
                }
                else{
                    $red=false;
                }
            }
            
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            function checkuser($file){
                while(!feof($file)){
                    
                }
            }
        ?>
        <?php
            $intype=filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $utype=0;
            if($intype=="Admin"){
                $utype=1;
            }
            elseif($intype=="Student"){
                $utype=2;
            }
            elseif($intype=="Teacher"){
                $utype=3;
            }
            elseif($intype=="Principal"){
                $utype=4;
            }
        ?>
        <div class="lgn">
        <h1>Login</h1>
        <form method="post" action="<?php if($red==true){
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
            //header("Location: http://localhost/CS244/index.php");
        }
        elseif ($red==false){
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        } ?>">
        ID: <input type="text" name="ID" value="<?php echo $ID;?>">
        <span class="error">* <?php echo $IDerr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $Email;?>">
        <span class="error">* <?php echo$Emailerr;?></span>
        <br><br>
        Password: <input type="password" name="pass" value="<?php echo $Pass;?>">
        <span class="error"><?php echo $Passerr;?></span>
        <br><br>
        <label for="login">Type:</label>
        <select name="login" id="login">
        <option value="Admin">Admin</option>
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
        <option value="Principal">Principal</option>
        </select> <br><br>
        <input type="submit" name="submit" value="Login" > <br>
        </form>
        </div>
    </body>
</html>