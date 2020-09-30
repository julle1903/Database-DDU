<?php
include 'Julius/core/dbconn.core.php';

$sqlUsers = "CREATE TABLE 'users' (
    'id' int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    'name' varchar(45) NOT NULL,
    'password' varchar(40) NOT NULL,
    'class' varchar(20) NOT NULL,
    PRIMARY KEY (id) 
)";

if (mysqli_query($conn, $sqlUsers)) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sqlBooks = "CREATE TABLE 'books' (
    'id' int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    'name' varchar(45) NOT NULL,
    'genre' varchar(45) NOT NULL,
    PRIMARY KEY (id) 
)";

if (mysqli_query($conn, $sqlBooks)) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sqlTrades = "CREATE TABLE 'trades'(
    'id' int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    'idUser' int(10) UNSIGNED NOT NULL,
    'idBook' int(10) UNSIGNED NOT NULL,
    PRIMARY KEY (id) 
)";

if (mysqli_query($conn, $sqlTrades)) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
?>



