<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email)) {

        $user_id = random_num(20);
        $query = "INSERT INTO users (user_id, user_name, email, password) VALUES ('$user_id', '$user_name', '$email','$password')";
        
        mysqli_query($con, $query);

        header("Location: login.php");
        die;

    } else {
        echo "Please enter some valid info";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container border rounded my-5">
    <form method="POST" action="signup.php">
    <div class="mb-3 p-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary m-3">Submit</button>
    <button class="btn btn-secondary m-3"> <a href="login.php">Login</a></button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>