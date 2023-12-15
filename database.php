<?php
//In order to run the database on XMAPP, you need to active the privilage.
$hostName = "localhost";
$dbUser = "login_register"; //the dbUser is login_register
$dbPassword = "1234"; //and the password is 1234
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
