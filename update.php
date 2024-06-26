<?php
include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])){
    $vorname = $_POST['vorname'];
    $nachname = $_POST['nachname'];
    $firma = $_POST['firma'];
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
    $user_id = $_POST['user_id'];

    $sql = "UPDATE info SET firstName='$vorname', lastName='$nachname', company='$firma', street='$street', houseNr='$houseNumber', postalNr='$postalNumber', city='$city', country='$country', phoneNr='$phoneNumber', mobileNr='$mobileNumber', publicEmail='$publicEmail', privateEmail='$privateEmail', faxNumber='$faxNumber' WHERE ID=$user_id";

    $result = $conn->query($sql); 
    if($result){
        echo "Die Daten wurden erfolgreich aktualisiert";
    }else{
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    $sql = "SELECT * FROM info WHERE ID = $user_id";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $vorname = $row['firstName'];
            $nachname = $row['lastName'];
            $firma = $row['company'];
            $street = $row['street'];
            $houseNumber = $row['houseNr'];
            $postalNumber = $row['postalNr'];
            $city = $row['city'];
            $country = $row['country'];
            $phoneNumber = $row['phoneNr'];
            $mobileNumber = $row['mobileNr'];
            $publicEmail = $row['publicEmail'];
            $privateEmail = $row['privateEmail'];
            $faxNumber = $row['faxNumber'];
            $id = $row['ID'];
        }
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
    <title>Update Form</title>
</head>
<body>            

<h3>Update Form:</h3>

<form action="update.php" method="post">
    <div class="form-group">

        <label>Vorname:</label><br>
        <input type="text" class="form-control" name="vorname" id="vorname" value = "<?php echo $vorname?>" required>

        <label>Nachname:</label><br>
        <input type="text" class="form-control" name="nachname" id="nachname" value = "<?php echo $nachname?>" required>

        <label>Firma:</label><br>
        <input type="text" class="form-control" name="firma" id="firma" value = "<?php echo $firma?>" required>

        <label>Name der Straße:</label><br>
        <input type="text" class="form-control" name="street" id="street" value = "<?php echo $street?>" required>

        <label>House Nummer:</label><br>
        <input type="text" class="form-control" name="houseNr" value = "<?php echo $houseNumber?>" required>

        <label>Postleitzahl:</label><br>
        <input type="text" class="form-control" name="postalNr" value = "<?php echo $postalNumber?>" required>

        <label>Stadt:</label><br>
        <input type="text" class="form-control" name="city" value = "<?php echo $city?>" required>

        <label>Land:</label><br>
        <input type="text" class="form-control" name="country" value = "<?php echo $country?>" required>

        <label>Handynummer:</label><br>
        <input type="text" class="form-control" name="phoneNr" value = "<?php echo $phoneNumber?>" required>

        <label>Telefonnummer:</label><br>
        <input type="text" class="form-control" name="mobileNr" value = "<?php echo $mobileNumber?>" required>

        <label>Öffentliche Email:</label><br>
        <input type="text" class="form-control" name="publicEmail" value = "<?php echo $publicEmail?>" required>

        <label>Private Email:</label><br>
        <input type="text" class="form-control" name="privateEmail" value = "<?php echo $privateEmail?>" required>

        <label>Fax Nummer:</label><br>
        <input type="text" class="form-control" name="faxNumber" value = "<?php echo $faxNumber?>" required>

        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    </div>
    
    <div class="form-btn">
        <input type="submit" name="update" class="btn btn-primary">
        <a href="index.php" class = "btn btn-primary">Zurück</a>
    </div>
</form>

</body>
</html>
