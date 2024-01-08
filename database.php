<?php
//In order to run a separate MySQL Server on XMAPP, you need to active the privilage.
//I set a username and a password.
$hostName = "localhost";
$dbUser = "Developer"; //the dbUser was login_register
$dbPassword = "Developer1234"; //and the password was 1234
$dbName = "AddressBuch"; //login_register
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}
