<?php
include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {

    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $firma = $_POST['firma'];
    $street = $_POST['street'];
    $houseNumber = $_POST['houseNr'];
    $postalNumber = $_POST['postalNr'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phoneNr'];
    $mobileNumber = $_POST['phoneNr'];
    $publicEmail = $_POST['publicEmail'];
    $privateEmail = $_POST['privateEmail'];
    $faxNumber = $_POST['faxNumber'];

    $errors = array();
    if(empty($vorname) or empty($nachname) or empty($firma) or empty($street) or empty($houseNumber) or empty($postalNumber) or empty($city) or empty($country) or empty($mobileNumber) or empty($publicEmail)){
        array_push($errors,"All fields are required");
    }if(filter_var(!$publicEmail,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Email is not valid");
    }
    if(filter_var(!$privateEmail,FILTER_VALIDATE_EMAIL)){
        array_push($errors,"Email is not valid");
    }

    //Inserting values to the database

    require_once "database.php";

    if(count($errors)>0){
        foreach($errors as $error){
            echo "<div class = 'alert alert-danger'>$error</div>";
        }
    }else{
        $sql = "INSERT INTO info (`firstName`, `lastName`, `company`,`street`, `houseNr`, `postalNr`, `city`, `country`, `phoneNr`, `mobileNr`, `publicEmail`, `privateEmail`, `faxNumber`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssss", $vorname, $nachname, $firma, $street, $houseNumber, $postalNumber, $city, $country, $phoneNumber, $mobileNumber, $publicEmail, $privateEmail, $faxNumber);
    
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

    <link rel = "stylesheet" href = "phone-number-validation/build/css/demo.css">
    <link rel = "stylesheet" href = "phone-number-validation/build/css/intlTelInput.css">
    <title>Data Insertion</title>
</head>

<body>            

   
<h3>Geben Sie bitte die folgende Daten:</h3><br>
<meta name="theme-color" content="#317EFB"/>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="form-group">
        <label> Vorname</label>
        <input type="text" class="form-control" name="vorname">

        <label> Nachname</label>
        <input type="text" class="form-control" name="nachname">

        <label> Name der Firma</label>
        <input type="text" class="form-control" name="firma">

        <label>Name der Straße:</label><br>
        <input type="text" class="form-control" name="street" placeholder = "Straßenname Ihres Hauses">

        <label> House Nummer</label>
        <input type="text" class="form-control" name="houseNr">

        
        <label> Postleitzahl</label>
        <input type="text" class="form-control" name="postalNr">

        <label> Stadt</label>
        <input type="text" class="form-control" name="city">

        <label> Land</label>
        <input type="text" class="form-control" name="country">


        <label> Arbeit Email</label>
        <input type="email" class="form-control" name="publicEmail">

        <label> Private Email</label>
        <input type="email" class="form-control" name="privateEmail" placeholder = "optionanl">

        <label>Fax Nummer</label>
        <input type="text" class= "form-control" name="faxNumber" placeholder = "optionanl">

        <label> Telefonnummer</label>
        <input type="text" class="form-control" name="phoneNr" placeholder = "optional">

        <label> Handynummer</label><br>
        <input type="tel" class="form-control" id = "phone" name="mobileNr" placeholder = "phone number">   <!--The country codes are here-->

    </div>


    <div class="form-btn">
        <input type="submit" value="Submit" name="submit" class="btn btn-primary"><br><br>
        <a href="index.php" class = "btn btn-primary">Return</a>
    </div>
</form>

<br><br>

<script src = "phone-number-validation/build/js/intlTelInput.js"></script>
        <script>
            var input = document.querySelector("#phone");
            window.intlTelInput(input,{});
        </script>

</body>

</html>