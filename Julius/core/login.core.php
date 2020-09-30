<?php

if (isset($_POST['submit/login'])) {

    require "dbconn.core.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?fejl=fejl_tommeFelter");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE name=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?fejl=fejl_sql");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $test = password_hash($row["password"], PASSWORD_DEFAULT); #skal slettes inden prod udelukkende for testing purposes
                $passwordCheck = password_verify($password, $test); 
                if ($passwordCheck == false) {
                    header("Location: ../index.php?fejl=fejl_forkertPassword");
                    exit();
                } else if ($passwordCheck == true) {
                    session_start();
                    $_SESSION["userId"] = $row["id"];
                    $_SESSION["userUsername"] = $row["name"];

                    header("Location: ../index.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?fejl=fejl_forkertPassword");
                    exit();
                }
            } else {
                header("Location: ../index.php?fejl=fejl_ingenMatchendeBruger");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();

}