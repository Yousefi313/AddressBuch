<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

$username = isset($_SESSION["first_name"]) ? $_SESSION["first_name"] : "Guest";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>User Dashboard</title>
</head>

<body>

    <div class="container">
        <h1>Welcome to Dashboard, <?php echo ucfirst($username); ?></h1><br><br> <!--The first letter of the username is written in uppercase by ucfirst() method-->
        <h4>The <u>logged-in users</u> are allowed to be here.</h4><br>

        <a href="insertion.php" class="btn btn-warning">Insert the data</a><br><br>
        <a href="view.php" class="btn btn-warning">view</a><br><br>
        <a href="logout.php" onclick="return myFunction()" class="btn btn-warning">Logout
            <script>
                function myFunction(){
                    if(confirm("Do you really want to delete it?")){
                        return true;
                    }else{
                        return false;
                    }
                }
            </script>
        </a><br><br>
</body>

</html>