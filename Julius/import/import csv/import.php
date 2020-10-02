<?php 
require "../../core/dbconn.core.php";


if(isset($_POST["import"])) {
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
                echo "done";
            } else {
                echo "ik done";
            }
        }
    }
}


?>

<form action="" method="post" name="uploadCsv" enctype="multipart/form-data">

<div>
    <h1>Vælg CSV fil</h1>
    <input type="file" name="file" accept=".csv">
    <button type="submit" name="import">Import</button>
</div>

</form>