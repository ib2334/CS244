<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="style1.css">
<html>
    <body>
        <div class="lgn">
        <h1>Login</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        ID: <input type="text" name="ID" value="<?php echo $_SESSION['ID'];?>">
        <span class="error">* <?php echo $_SESSION['IDe'];?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $_SESSION['email'];?>">
        <span class="error">* <?php echo$_SESSION['Ee'];?></span>
        <br><br>
        Password: <input type="password" name="pass" value="<?php echo $_SESSION['pass'];?>">
        <span class="error"><?php echo $_SESSION['Pe'];?></span>
        <br><br>
        <input type="submit" name="submit" value="Login" > <br>
        </form>
        </div>
    </body>
</html>