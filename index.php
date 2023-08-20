<?php
session_start();

include("connection.php");
include("functions.php");

header("Cache-Control: no-cache, must-revalidate");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <a href="logout.php">logout</a>
    <h1>This is the index page</h1>
    <br>
    <p>Hello, <?php echo $user_data['user_name'];?></p>
</body>
</html>