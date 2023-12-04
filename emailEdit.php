<?php 

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
$userID = $_SESSION["userID"];

require_once "database.php";

$sql = "SELECT * FROM users WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();

// require_once "database.php";

if(isset($_POST["update"])){
    $newEmail = $_POST["newEmail"];

    $updateEmailSql = "UPDATE users SET email = ? WHERE userID = ?";
    $updateEmailStmt = $conn->prepare($updateEmailSql);
    $updateEmailStmt->bind_param("si", $newEmail, $userID);
    $updateEmailStmt->execute();

    echo "<div class='alert alert-success'>User data updated successfully.</div>";
    
    $updateEmailStmt->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Edit your Email</title>
</head>
<body>
    <form action="emailEdit.php" method="post">
        <!-- <div class="form-group">
        <input type="email" class="form-control" name="oldEmail" placeholder="Current Email:">
        </div> -->
        <div class="form-group">
        <input type="email" class="form-control" name="newEmail" placeholder="New Email:">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register" name="update">
        </div><br><br>
    </form>
    <a href="index.php">Click here to the main page</a>
</body>
</html>