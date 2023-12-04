<?php

$hostName = "localhost";
$dbUser = "login_register";
$dbPassword = "1234";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
