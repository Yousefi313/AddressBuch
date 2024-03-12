<?php
include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

if(isset($_GET['id'])){
    $user_id = $_GET['id'];
    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM info WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id); // Assuming id is an integer
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo "Es wurde gelöscht";
        header("Location: view.php");
    }else{
        echo "Error: ". $stmt->error;
    }
    $stmt->close();
}
?>
