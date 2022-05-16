<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="Frontend/style2.css">
<html>
    <div id="nav-placeholder"></div>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
    $.get("Frontend/nav.html", function(data){
        $("#nav-placeholder").replaceWith(data);
    });
    </script>
    <body>
        <div class="login">
        <h1>Login</h1>
        Login as:
        <form method="POST" action="Frontend/login.php">
        <input class="button" type="submit" name="submit" value="Admin"> <br>
        Login as:
        <form method="POST" action="Frontend/login.php"> <br>
        <input class="button" type="submit" name="submit" value="Student"> <br>
        Login as:
        <form method="POST" action="Frontend/login.php"> <br>
        <input class="button" type="submit" name="submit" value="Teacher"> <br>
        Login as:
        <form method="POST" action="Frontend/login.php"> <br>
        <input class="button" type="submit" name="submit" value="Principal"> <br>
        </div>
    </body>
</html>