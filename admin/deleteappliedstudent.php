<?php
require_once "../include/dbconn.php";
require_once "../include/functions.php";

session_start();

if (isset($_SESSION["username"])) {

    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $companyName = $_POST["companyname"];
        deleteAppliedStudent($conn, $username, $companyName);
    } else {
        header("location: ./administrator.php");
        exit();
    }
} else {
    header("location: ./login.php");
    exit();
}
