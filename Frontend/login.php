<?php session_start(); ?>
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
                $IDcheck=$_POST['ID'];
                $Emailcheck=$_POST['email'];
                $Passcheck=$_POST['pass'];
                $Err="Paramaters invalid";
                $filetype=fopen($file,'a+') or die ('File Inaccesible');
                $seperator="|";
                while(!feof($filetype)){
                    $line=fgets($filetype);
                    $Arrline=explode($seperator,$line);
                    if($Arrline[0]==$IDcheck && $Arrline[3]==$Emailcheck && $Arrline[4]==$Passcheck){
                        return $IDcheck;
                        fclose($filetype);
                    }
                }
                if($IDcheck!="" || $Emailcheck!="" || $Passcheck!=""){
                    return $Err;
                }
                fclose($filetype);
            }
        ?>
        <?php
            $intype=filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
            $utype=0;
            $uval="";
            if($intype=="Admin"){
                if(checkuser('../Invoices/Admin.txt') == "Paramaters invalid"){
                    $IDerr=checkuser('../Invoices/Admin.txt');
                }
                else{
                    $utype=checkuser('../Invoices/Admin.txt');
                    $uval="a";
                }
            }
            elseif($intype=="Student"){
                if(checkuser('../Invoices/Student.txt') == "Paramaters invalid"){
                    $IDerr=checkuser('../Invoices/Student.txt');
                }
                else{
                    $utype=checkuser('../Invoices/Student.txt');
                    $uval="s";
                }
            }
            elseif($intype=="Teacher"){
                if(checkuser('../Invoices/Teacher.txt') == "Paramaters invalid"){
                    $IDerr=checkuser('../Invoices/Teacher.txt');
                }
                else{
                    $utype=checkuser('../Invoices/Teacher.txt');
                    $uval="t";
                }
            }
            elseif($intype=="Principal"){
                if(checkuser('../Invoices/Principal.txt') == "Paramaters invalid"){
                    $IDerr=checkuser('../Invoices/Principal.txt');
                }
                else{
                    $utype=checkuser('../Invoices/Principal.txt');
                    $uval="p";
                }
            }
        ?>
        <div class="lgn">
        <h1>Login</h1>
        <form method="post" action="<?php if($red==true && $uval=="a"){
            header("Location: http://localhost/CS244/Backend/Admin.php");
            $_SESSION['ID'] = $utype;
        }
        elseif($red==true && $uval=="s"){
            header("Location: http://localhost/CS244/Backend/Student.php");
            $_SESSION['ID'] = $utype;
        }
        elseif($red==true && $uval=="t"){
            header("Location: http://localhost/CS244/Backend/Teacher.php");
            $_SESSION['ID'] = $utype;
        }
        elseif($red==true && $uval=="p"){
            header("Location: http://localhost/CS244/Backend/Principal.php");
            $_SESSION['ID'] = $utype;
        }
        elseif ($red==false){
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        } ?>">
        ID: <input type="text" name="ID" value="<?php echo $ID;?>">
        <span class="error">* <?php echo $IDerr;?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $Email;?>">
        <span class="error">* <?php echo $Emailerr;?></span>
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