<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
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
    <title>Data Insertion</title>
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        $street = $_POST['street'];
        $houseNumber = $_POST['houseNumber'];
        $postalNumber = $_POST['postalNumber'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $phoneNumber = $_POST['phoneNumber'];
        $mobileNumber = $_POST['mobileNumber'];
        $publicEmail = $_POST['publicEmail'];
        $privateEmail = $_POST['privateEmail'];
        $faxNumber = $_POST['faxNumber'];

        $sql = "INSERT INTO address (street, house_Nr,postal_Nr,city, country, phone_Nr, mobile_Nr,public_Email, private_Email,fax_number) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $stm = mysqli_stmt_init($conn);
        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
    }
    ?>


    <h3>Insert the followng data:</h3><br>


    <div class="form-group">
        <label>Name of the Street:</label><br>
        <input type="text" class="form-control" name="street">
    </div>
    <div class="form-group">
        <label>House Number:</label><br>
        <input type="text" class="form-control" name="houseNumber">
    </div>
    <div class="form-group">
        <label>Postal Number:</label><br>
        <input type="text" class="form-control" name="postalNumber">
    </div>
    <div class="form-group">
        <label>Name of your city:</label><br>
        <input type="text" class="form-control" name="city">
    </div>
    <div class="form-group">
        <label>Name of your country:</label><br>
        <input type="text" class="form-control" name="country">
    </div>
    <div class="form-group">
        <label>Phone number:</label><br>
        <input type="text" class="form-control" name="phoneNumber">
    </div>
    <div class="form-group">
        <label>Mobile number:</label><br>
        <input type="text" class="form-control" name="mobileNumber">
    </div>
    <div class="form-group">
        <label>Public Email:</label><br>
        <input type="text" class="form-control" name="publicEmail">
    </div>
    <div class="form-group">
        <label>Private Email:</label><br>
        <input type="text" class="form-control" name="privateEmail">
    </div>
    <div class="form-group">
        <label>Fax number:</label><br>
        <input type="text" class="form-control" name="faxNumber">
    </div>

    <div class="form-btn">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </div>

    </form><br><br>




    <a href="index.php">Click here to the main page</a>
</body>

</html>