<?php 
require "../../core/dbconn.core.php";


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
                echo "Success ";
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
                echo "Success ";
            } else {
                echo "Fejl ";
            }
        }
    }
}


?>




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
