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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <a href="logout.php">logout</a>
    <h1>This is the index page</h1>
    <br>
    <p>Hello, <?php echo $user_data['user_name'];?></p>
    </div>
    <div class="container">
        <p>Username: <?php echo $user_data['user_name'];?></p>
        <p>Email: <?php echo $user_data['email'];?></p>
        <p>Phone: <?php echo $user_data['phone'];?></p>
        <button type="submit" class="btn btn-primary m-3"><a href="update.php">Update Information</a></button>
        <button type="submit" class="btn btn-primary m-3"><a href="updatepass.php">Update Password</a></button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>