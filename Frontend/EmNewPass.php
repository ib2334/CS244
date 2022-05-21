<?php session_start(); ?>
<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="nav.css">
<link rel="stylesheet" type="text/css" href="lgin.css">
<html>
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript">
            function test(){
                alert('Execute Javascript Function Through PHP');
            }
        </script>
    </head>
    <div id="nav-placeholder"></div>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
        $.get("nav.html", function(data){
            $("#nav-placeholder").replaceWith(data);
        });
    </script>
    <?php
        $sendEM="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sendEM=$_POST['email'];
        }
        $val=false;
        $file= "../Invoices/Admin.txt";
        $filetype=fopen($file,'a+') or die ('File Inaccesible');
        $seperator="|";
        while(!feof($filetype)){
            $line=fgets($filetype);
            $Arrline=explode($seperator,$line);
            echo $Arrline[3]."<br>";
            if($Arrline[3]==$sendEM){
                $val=true;
                fclose($filetype);
                break;
            }
        }
       
    ?>
    <body>
        <hr id="navsep"></hr>
        <div class="lgn">
            <form method="post" action="<?php if($val==true){
                echo "yes";
                header("Location: http://localhost/CS244/Frontend/sendem.php");
                $_SESSION['email'] = $sendEM;
            }
            ?>">
            <h1 id="ln">Reset Password</h1>
            <hr class="lnsep"></hr>
            <p class="info">Please Enter Your Email</p>
            <div class="form">
                E-mail: <input type="text" name="email" value="<?php echo $sendEM?>">
                <br><br>
                <input type="submit" name="submit" value="Confirm" class="lnbutton"><br><br>
                </form>
            </div>
        </div>
    </body>
</html>