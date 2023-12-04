<?php
if (isset($_POST['name']) && isset($_POST['message'])) {
    include 'db_conn.php';

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $currentDateTime = date('Y-m-d H:i:s');
    $name = validate($_POST['name']);
    $message = validate(($_POST['message']));

    if (empty($message) || empty($name)) {
        header("Location: index.html");
    } else {
        $sql = "INSERT INTO feedback(name, message,feedbackTime) VALUES('$name','$message','$currentDateTime')";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "Your message was sent successfully!";
            header("Location: index.php");
            die();
        } else {
            echo "Your message couldn't be sent!";
        }
    }
} else {
    header("Location: index.php"); //index.php
}
