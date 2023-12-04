<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Feedback</title>
</head>

<body>
    <form method="post" action="send.php">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>

        <label>Message:</label><br>
        <textarea name="message" cols="30" rows="10" required></textarea><br>
        <input type="submit" name="btn">
    </form><br><br>
    <a href="index.php">Click here to the main page</a>
</body>

</html>