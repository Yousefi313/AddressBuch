<?php
//In order to run a separate MySQL Server on XMAPP, you need to active the privilage.
//I set a username and a password.
$hostName = "localhost";
$dbUser = "login_register"; //the dbUser was login_register
$dbPassword = "1234"; //and the password was 1234
$dbName = "login_register"; //login_register
//$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
//if (!$conn) {
//    die("Something went wrong;");
//}
$conn = new mysqli($hostName, $dbUser, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connectin Failed". $conn->connect_error);
}
