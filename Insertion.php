<?php
include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
    $street = $_POST['street'];
    $houseNumber = $_POST['houseNr'];
    $postalNumber = $_POST['postalNr'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phoneNr'];
    $mobileNumber = $_POST['mobileNr'];
    $publicEmail = $_POST['publicEmail'];
    $privateEmail = $_POST['privateEmail'];
    $faxNumber = $_POST['faxNumber'];

    $errors = array();
    if(empty($street) or empty($houseNumber) or empty($postalNumber) or empty($city) or empty($country) or empty($mobileNumber) or empty($publicEmail)){
        array_push($errors,"All fields are required");
    }if(filter_var(!$publicEmail,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Email is not valid");
    }

    require_once "database.php";

    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class = 'alert alert-danger'>$error</div>";
        }
    }else{
        $sql = "INSERT INTO info (`street`, `houseNr`, `postalNr`, `city`, `country`, `phoneNr`, `mobileNr`, `publicEmail`, `privateEmail`, `faxNumber`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssss", $street, $houseNumber, $postalNumber, $city, $country, $phoneNumber, $mobileNumber, $publicEmail, $privateEmail, $faxNumber);
    
        if ($stmt->execute()) {
        echo "Ihre Daten wurden erfolgreich hochgeladen";
        header("Location:index.php");
        } else {
        echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
        $conn->close();
    }
    

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

   
<h3>Insert the following data:</h3><br>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label>Name of the Street:</label><br>
        <input type="text" class="form-control" name="street">

        <label> House Nr.</label>
        <input type="text" class="form-control" name="houseNr">

        
        <label> Postal Nr.</label>
        <input type="text" class="form-control" name="postalNr">

        <label> City</label>
        <input type="text" class="form-control" name="city">

        <label> Country</label>
        <input type="text" class="form-control" name="country">

        <label> Phone Number</label>
        <input type="text" class="form-control" name="phoneNr" placeholder = "optional">

        <label> Mobile Number</label>
        <input type="text" class="form-control" name="mobileNr">

        <label> Public Email</label>
        <input type="email" class="form-control" name="publicEmail">

        <label> Private Email</label>
        <input type="email" class="form-control" name="privateEmail" placeholder = "optionanl">

        <label>Fax Number</label>
        <input type="text" class= "form-control" name="faxNumber" placeholder = "optionanl">

    </div>
    <!-- Other input fields go here -->
        <div class="form-btn">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary">
    </div>
</form>

<br><br>
<a href="index.php">Click here to the main page</a>
</body>

</html>