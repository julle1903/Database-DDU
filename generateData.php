<?php
include 'Julius/core/dbconn.core.php';

$loadSQL = "LOAD DATA
    INFILE `C:\SomePath\WhereTextFileIs\ActualFile.txt`
    INTO TABLE YourMySQLTable
    COLUMNS TERMINATED BY `','`  
    LINES TERMINATED BY `\r\n` ;";
mysqli_query($conn,$loadSQL);

?>
