<?php 
$servername = "localhost";
$username = "root";
$password = "";
$name = "ddudb";

$conn = mysqli_connect($servername, $username, $password, $name);


if (!$conn) {
    die("Could not establish connection to the database: ".mysqli_connect_error());
}