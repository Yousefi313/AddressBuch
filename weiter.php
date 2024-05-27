<?php
include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); 
}

// Get the ID from the request
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "SELECT * FROM info WHERE ID = $id";
    $result = $conn->query($sql);
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Weitere Info Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Kontent</h2>
        <div class="form-btn">
            <a href="view.php" class="btn btn-primary">Zurück</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Firmaa</th>
                    <th>Straße</th>
                    <th>House Nr</th>
                    <th>Postleitzahl</th>
                    <th>Stadt</th>
                    <th>Land</th>
                    <th>Telefon Nr.</th>
                    <th>Handynummer</th>
                    <th>Arbeit Email</th>
                    <th>Private Email</th>
                    <th>Fax Nummer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><?php echo $row['company']; ?></td>
                            <td><?php echo $row['street']; ?></td>
                            <td><?php echo $row['houseNr']; ?></td>
                            <td><?php echo $row['postalNr']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['country']; ?></td>
                            <td><?php echo $row['phoneNr']; ?></td>
                            <td><?php echo $row['mobileNr']; ?></td>
                            <td><?php echo $row['publicEmail']; ?></td>
                            <td><?php echo $row['privateEmail']; ?></td>
                            <td><?php echo $row['faxNumber']; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='13'>Keine Daten gefunden</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
