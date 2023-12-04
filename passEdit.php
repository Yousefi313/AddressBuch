<?php 
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Edit your password</title>
</head>
<body>
    <form action="passEdit.php" method="post">
        <div class="form-group">
            <input type="password" placeholder="Current Password:" name="currentPassword" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="New Password" name="newPassword" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Register" name="update">
        </div><br><br>
    </form>
    <a href="index.php">Click here to the main page</a>
</body>
</html>