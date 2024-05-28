<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Added exit to prevent further execution
}
include "database.php";
$sql = "SELECT * FROM info";
$result = $conn->query($sql);

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
    <style>
        h1 {
            font-size: 70px;
            font-weight: 600;
            background-image: url(uploads/viola-edible-flowers.jpg);
            background-size: 250px;
            background-repeat: repeat;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .btn-container .btn {
            flex: 1;
            margin: 0 10px;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="btn-container">
            <a href="insertion.php" class="btn btn-warning">Add User</a>
            <!-- <a href="view.php" class="btn btn-warning">View</a> -->
            <a href="logout.php" onclick="return myFunction()" class="btn btn-warning">Logout</a>
        </div>
        <h1>Address Buch</h1>
        <h3>Welcome to Dashboard, <?php echo ucfirst($username); ?></h3>

        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <!-- <th>Firmaa</th> -->
                        <!-- <th>Straße</th> -->
                        <!-- <th>House Nr</th> -->
                        <!-- <th>Postleitzahl</th> -->
                        <th>Stadt</th>
                        <!-- <th>Land</th>
                        <th>Telefon Nr.</th>
                        <th>Handynummer</th> -->
                        <th>Arbeit Email</th>
                        <th>Weiter</th>
                        <!-- <th>Private Email</th>
                        <th>Fax Nummer</th> -->
                        <th>Actions</th> <!-- Added Actions column -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <!-- <td><?php //echo $row['ID']; ?></td> -->
                                <td><?php echo $row['firstName']; ?></td>
                                <td><?php echo $row['lastName']; ?></td>
                                <!-- <td><?php //echo $row['company']; ?></td> -->
                                <!-- <td><?php //echo $row['street']; ?></td>
                                <td><?php //echo $row['houseNr']; ?></td>
                                <td><?php //echo $row['postalNr']; ?></td> -->
                                <td><?php echo $row['city']; ?></td>
                                <!-- <td><?php //echo $row['country']; ?></td>
                                <td><?php //echo $row['phoneNr']; ?></td>
                                <td><?php //echo $row['mobileNr']; ?></td> -->
                                <td><?php echo $row['publicEmail']; ?></td>
                                <td><a href="weiter.php?id=<?php echo $row['ID']; ?>">Weitere Info</a></td>
                                <!-- <td><?php //echo $row['privateEmail']; ?></td>
                                <td><?php //echo $row['faxNumber']; ?></td> -->
                                <td><a class="btn btn-info" href="update.php?id=<?php echo $row['ID']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" onclick="return myFunction()" href="delete.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
                            </tr>
                            <script>
                                function myFunction() {
                                    if (confirm("Do you really want to delete it?")) {
                                        return true;
                                    } else {
                                        return false;
                                    }
                                }
                            </script>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='6'>Keine Daten gefunden</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
