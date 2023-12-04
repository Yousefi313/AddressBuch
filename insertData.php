<?php
  /* ----------- File upload ---------- */

  session_start();
    if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
  require_once  "database.php";

 

  $allowed_ext = array('png', 'jpg', 'jpeg', 'gif');

 if(isset($_POST['submit'])) {
   // Check if file was uploaded
   if(!empty($_FILES['upload']['name'])) {
    $file_name = $_FILES['upload']['name'];
    $file_size = $_FILES['upload']['size'];
    $file_tmp = $_FILES['upload']['tmp_name'];
    $target_dir = "uploads/${file_name}";   //This is the file path which can be very helpful latar. To save it into the database.

    //$title = $_POST['title'];
    //$beschreibung = $_POST['beschreibung'];
    // Get file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));
    // echo $file_ext;

    // Validate file type/extension
    if(in_array($file_ext, $allowed_ext)) {
      // Validate file size
      if($file_size <= 1000000) { // 1000000 bytes = 1MB
        // Upload file
        //move_uploaded_file($file_tmp, $target_dir);
        //move_uploaded_file($file_tmp, $target_dir); //Should be uncommented at the end.

          // if(isset($_SESSION["userID"])){
          //   $userID = $_SESSION["userID"];
          //   echo "The user ID is: ".$userID;
          // }else{
          //   echo "The user ID not found.";   //Here should be uncommented.
          // }

        if(move_uploaded_file($file_tmp, $target_dir)){
          $userID = $_SESSION["userID"];
          $title = $_POST['title'];
          $beschreibung = $_POST['beschreibung'];
          $filePath = $target_dir;

          require_once "database.php";

          $sql = "INSERT INTO produkt(userID,filePath,title,beschreibung) VALUES(?,?,?,?)";
          $stmt = mysqli_stmt_init($conn);
          $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if($prepareStmt){
              mysqli_stmt_bind_param($stmt,"isss",$userID,$filePath,$title,$beschreibung);
              mysqli_stmt_execute($stmt);
              echo '<p style="color: green;">Data has been uploaded successfully</p><br>';
            }
        }else{
          echo "Your file can't be uploaded.";
        }
        // Success message
        echo '<p style="color: green;">File uploaded!</p><br>';
        echo "The size of your file is: ".($file_size/1000000)." MB<br>";
        echo "The path of the file: ".$target_dir;

      } else {
        echo '<p style="color: red;">File too large!</p>';
      }
    } else {
      $message = '<p style="color: red;">Invalid file type!</p>';
    }
   } else {
     $message = '<p style="color: red;">Please choose a file</p>';
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
    <title>File Upload</title>
</head>

<body>
    <?php echo $message ?? null; ?>
    <form action="<?php echo htmlspecialchars(
                        $_SERVER['PHP_SELF']
                    ); ?>" method="post" enctype="multipart/form-data">
        <h3>Select image to upload:</h3><br>

        <div class="form-group">
            <input type="file" class="form-control" name ="upload">
        </div>

        <div class="form-group">
            <label>Title of the product:</label><br>
            <input type="text" class="form-control" name ="title">
        </div>

        <div class="form-group">
            <label>Descripe the your product:</label><br>
            <!--
                <input type="text" class="form-control">
            -->
            <textarea name="beschreibung" type="text" cols="30" rows="10" class="form-control" required></textarea>
        </div>

        <div class="form-btn">
            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
        </div>

    </form><br><br>




    <a href="index.php">Click here to the main page</a>
    <?php
    echo $file_ext ?? null; //It shows the extension of the file.
    ?>
</body>

</html>