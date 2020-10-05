<?php 
    require "header.php";
    require "core/dbconn.core.php";


    if(isset($_POST["deleteDB"])) {

        $sqlInsert = "DROP TABLE IF EXISTS users, books, trades;";
        $result = mysqli_query($conn, $sqlInsert) or die(mysqli_error($conn));

        echo "Database indholdet er nu slettet";
    }

    if (isset($_POST["knap2"])) {
        $sqlBackup = "BACKUP DATABASE ddudb TO DISK = './import/dbBackup.bak';";
        $result = mysqli_query($conn, $sqlBackup) or die(mysqli_error($conn));

        echo "database er nu backed up";
    }

    if (isset($_POST["knap1"])) {
        require "../generateTable.php";
    }
?>

<div class = "textImp">
    <form method = "post">
        <input type="submit" name="knap1" value="Initialiser Demo Systemet" />
    </form>

    <form method = "post">
        <input type="submit" name="deleteDB" value="Slet database indhold" />
    </form>

<?php
if(isset($_POST["importUsers"])) {
    $filename = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");

        while(($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $passwordTemp = trim($column[4]);
            $passwordTemp = password_hash($passwordTemp, PASSWORD_DEFAULT);

            $sql = "Insert into users (type, class, firstname, lastname, password) 
            values ('" . $column[0] . "', '" . $column[1] ."', '" . $column[2] . "', '" . $column[3] . "', '" . $passwordTemp ."')";

            $result = mysqli_query($conn, $sql);

            if(!empty($result)) {
            } else {
                echo "Fejl ";
            }
        }
    }
}

?>

<?php

if(isset($_POST["importBooks"])) {
    $filename = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");

        while(($column = fgetcsv($file, 10000, ",")) !== FALSE) {


            $sql = "Insert into books (title,author) 
            values ('" . $column[0] . "', '" . $column[1] ."')";

            $result = mysqli_query($conn, $sql);

            if(!empty($result)) {
            } else {
                echo "Fejl ";
            }
        }
    }
}

?>

<form method = "post">
    <input type="submit" name="knap2" value="Lav database backup" />
</form>

<a href="./import/templateelever.csv" download="skabelon til bøger.csv">
  <button>Download skabelon til elever</button>
</a>

<a href="./import/templatebooks.csv" download="skabelon til bøger.csv">
  <button>Download skabelon til bøger</button>
</a>




<form action="" method="post" name="uploadCsv" enctype="multipart/form-data">
<div>
    <h1>Vælg CSV fil med brugere</h1>
    <input type="file" name="file" accept=".csv">
    <button type="submit" name="importUsers">Import brugere</button>
</div>

</form>

<form action="" method="post" name="uploadCsv" enctype="multipart/form-data">

<div>
    <h1>Vælg CSV fil med bøger</h1>
    <input type="file" name="file" accept=".csv">
    <button type="submit" name="importBooks">Import books</button>
</div>

</form>
</div>

<?php 
require 'footer.php';
?>