<?php session_start(); ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="lgin.css">
<html>
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <div id="nav-placeholder"></div>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
    $.get("nav.html", function(data){
        $("#nav-placeholder").replaceWith(data);
    });
    function myFunction() {
        var x = document.getElementById("inp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
        }
    </script>
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
                $Err=0;
                $filetype=fopen($file,'a+') or die ('File Inaccesible');
                $seperator="|";
                $i=0;
                while(!feof($filetype)){
                    $line=fgets($filetype);
                    $Arrline=explode($seperator,$line);
                    if($Arrline[0]==$IDcheck){
                        fclose($filetype);
                        return $IDcheck;
                    }
                }
                $Err=1;
                return $Err;
                fclose($filetype);
            }
        ?>
        <?php
            $intype=filter_input(INPUT_POST, 'login', FILTER_UNSAFE_RAW);
            $utype=0;
            $uval="";
            if($intype=="Admin"){
                if(checkuser('../Invoices/Admin.txt') == 1){
                    $IDerr="Paramaters Invalid";
                }
                else{
                    echo "Good";
                    $utype=checkuser('../Invoices/Admin.txt');
                    $uval="a";
                }
            }
            elseif($intype=="Student"){
                if(checkuser('../Invoices/Student.txt') == 1){
                    $IDerr="Paramaters Invalid";
                }
                else{
                    $utype=checkuser('../Invoices/Student.txt');
                    $uval="s";
                }
            }
            elseif($intype=="Teacher"){
                if(checkuser('../Invoices/Teacher.txt') == 1){
                    $IDerr="Paramaters Invalid";
                }
                else{
                    $utype=checkuser('../Invoices/Teacher.txt');
                    $uval="t";
                }
            }
            elseif($intype=="Accountant"){
                if(checkuser('../Invoices/Accountant.txt') == 1){
                    $IDerr="Paramaters Invalid";
                }
                else{
                    $utype=checkuser('../Invoices/Accountant.txt');
                    $uval="p";
                }
            }
        ?>
        <hr id="navsep"></hr>
        <div class="lgn">
            <h1 id="ln">Login</h1>
            <hr class="lnsep"></hr>
            <p class="info">Please Enter Your Information</p>
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
                header("Location: http://localhost/CS244/Backend/Accountant.php");
                $_SESSION['ID'] = $utype;
            }
            elseif ($red==false){
                echo htmlspecialchars($_SERVER["PHP_SELF"]);
            } ?>">
            <div class="form">
                ID: <input type="text" name="ID" value="<?php echo $ID;?>">
                <span class="error">* <?php echo $IDerr;?></span>
                <br><br>
                E-mail: <input type="text" name="email" value="<?php echo $Email;?>">
                <span class="error">* <?php echo $Emailerr;?></span>
                <br><br>
                Password: <input id="inp" type="password" name="pass" value="<?php echo $Pass;?>">
                <span class="error"><?php echo $Passerr;?></span>
                <br><br>
                <input type="checkbox" onclick="myFunction()">Show Password<br><br>
                <label for="login">Type:</label>
                <select name="login" id="login">
                    <option value="Admin">Admin</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Accountant">Accountant</option>
                </select> <br><br>
                <input type="submit" name="submit" value="Login" class="lnbutton"><br><br>
                <a class="fp" href="http://localhost/CS244/Frontend/EmNewPass.html">Forgot Password?<br><br>
                </form>
            </div>
        </div>
    </body>
</html>