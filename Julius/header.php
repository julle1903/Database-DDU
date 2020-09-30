<?php
    session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Database System</title>
    <meta name="author" content="">
    <link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png"> 
    <link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
    <link rel="manifest" href="/ico/site.webmanifest">
    <link rel="stylesheet" href="stylesheet.css" type="text/css">
  </head>
  <body>
    <header>
        <nav>
            <a href="#">
                <img src="logo/logo.png" alt="logo">
            </a>
            <ul>
                <li><button href="index.php">Home</button></li>
                <form method="post">
                    <li><input type="submit" name="knap1" value="Initialiser Demo Systemet" /></li>
                </form>
                <li><button onClick="development()" href="#">Support</button></li>
            </ul>
        </nav>
        <?php 
        if (isset($_POST["knap1"])) {
            require "../generateTable.php";
            require "../generateData.php";
        }
         
        ?>
        <script>
            function development() {
                alert(location.hostname + "\nEr stadig under udvikling\nDette gør at ikke alle sider virker endnu...");
            }
        </script>
    </header>