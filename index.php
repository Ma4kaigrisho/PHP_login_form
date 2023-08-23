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
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container my-5 rounded">
        <h1 class="my-2 py-5">Welcome <?php echo $user_data['user_name'];?></h1>
        <table class="table table-dark table-striped-columns py-3 my-5 rounded">
            <tr>
                <th>User Info</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td><p><b>Username:</b> <?php echo $user_data['user_name'];?></p><br></td>
                <td><button type="submit" class="btn btn-primary m-3"><a href="update.php">Update Information</a></button></td>
            </tr>
            <tr>
                <td><p><b>Email:</b> <?php echo $user_data['email'];?></p><br></td>
                <td><button type="submit" class="btn btn-primary m-3"><a href="updatepass.php">Update Password</a></button></td>
            </tr>
            <tr>
                <td><p><b>Phone:</b> <?php echo $user_data['phone'];?></p><br></td>
                <td><button type="submit" class="btn btn-primary m-3"><a href="logout.php">Logout</a></button></td>
            </tr>
        </table>
        <div class="space"></div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>