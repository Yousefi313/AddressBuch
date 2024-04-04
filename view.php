<?php
include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit(); // Add exit after header redirection
}

$sql = "SELECT * FROM info";
$result = $conn->query($sql);
?>

<!DOCTYPE html>

<html>

<head>
    <title>View Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Users</h2>
        <div class="form-btn">
            <a href="index.php" class = "btn btn-primary">Return</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Street</th>
                    <th>House number</th>
                    <th>Postal number</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Phone number</th>
                    <th>Mobile number</th>
                    <th>Public Email</th>
                    <th>Private Email</th>
                    <th>Fax number</th>
                    <th>Actions</th> <!-- Added Actions column -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
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
                            <td><a class="btn btn-info" href="update.php?id=<?php echo $row['ID']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" onclick = "return myFunction()" href="delete.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
                        </tr>
                        <script>
                function myFunction(){
                    if(confirm("Do you really want to delete it?")){
                        return true;
                    }else{
                        return false;
                    }
                }
            </script>
                <?php
                    }
                }//Here you can use an else statement to show that there is noting to show
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>
