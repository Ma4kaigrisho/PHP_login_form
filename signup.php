<?php
session_start();

include("connection.php");
include("functions.php");
$_SESSION["registration_success"] = NULL;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $success = false;

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($email)) {

        $user_id = random_num(20);
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (user_id, user_name, phone, email, password) VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $user_id, $user_name, $phone, $email, $hashed_pass);
        mysqli_stmt_execute($stmt);
        $_SESSION["registration_success"] = true;

        

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
    <form method="POST" action="signup.php" onsubmit="return validateForm();">
    <div class="mb-3 p-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Phone number</label>
        <input type="text" class="form-control" name="phone" id="phone">
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary m-3">Submit</button>
    <button class="btn btn-secondary m-3"> <a href="login.php">Login</a></button>
</form>
    </div>
    <div class="success" <?php if(isset($_SESSION["registration_success"])) echo "style='display: flex;'"; ?>>
        Successfully Registered
        <br>
        <button class="btn btn-secondary m-3"> <a href="login.php">Login</a></button>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>