<?php
session_start();

include("connection.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = htmlspecialchars($_POST['password']);
    $success = false;

    if (!empty($password)) {

        // Assuming you have a user_id in the session or as a parameter
        $user_id = $_SESSION['user_id'];

        // Only hash the password if it's not empty
        $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password=? WHERE user_id=?";
        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "si", $hashed_pass, $user_id);
        mysqli_stmt_execute($stmt);

        // Redirect after successful update
        header("Location: index.php");
        exit();
    } else {
    }
}

header("Cache-Control: no-cache, must-revalidate");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<div class="container">
<form method="POST" action="updatepass.php" onsubmit="return validateForm();">
    <div class="mb-3 p-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary m-3">Submit</button>
</form>
<button type="submit" class="btn btn-primary m-3"><a href="index.php">Cancel</a></button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>