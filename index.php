<?php

session_start();

if(!isset($_SESSION["userid"]) || $_SESSION["userid"] !==true) {
    header("location: loginpage.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Velkommen <?php echo $_SESSION["name"]; ?></title>
    </head>
    <body>
        <div class="container">
            <div class="">
                <div class="">
                    <h1>Hello, <?php echo $_SESSION["name"]; ?>. Velkommen til denne side.</h1>
                
                </div>
                <p>
                    <a href="logout.php" class="" role="button" aria-pressed="true">Log ud</a>
                </p>
            </div>
        </div>
    </body>
</html>

