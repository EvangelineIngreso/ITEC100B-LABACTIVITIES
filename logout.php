<?php
require 'configg.php';
session_start();

$username = $_SESSION["username"];

$query = mysqli_query($con, "INSERT INTO eventlog(username, transaction_type) VALUES('$username', 'Logout')");

if (!$query) {
    exit("error");
}

$_SESSION = array();

session_destroy();

header("location: login.php");
exit;
