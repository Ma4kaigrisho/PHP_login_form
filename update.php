<?php
session_start();

include("connection.php");
include("functions.php");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = htmlspecialchars($_POST['user_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $success = false;

    if (!empty($user_name) && !is_numeric($user_name) && !empty($email)) {

        // Assuming you have a user_id in the session or as a parameter
        $user_id = $_SESSION['user_id'];

        $query = "UPDATE users SET user_name=?, phone=?, email=? WHERE user_id=?";
        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $user_name, $phone, $email, $user_id);
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
<form method="POST" action="update.php" onsubmit="return validateForm();">
    <div class="mb-3 p-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $user_data['email']; ?>">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_data['user_name']; ?>">
    </div>
    <div class="mb-3 p-3">
        <label class="form-label">Phone number</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $user_data['phone']; ?>">
    </div>
    <button type="submit" class="btn btn-primary m-3">Submit</button>
</form>
<button type="submit" class="btn btn-primary m-3"><a href="index.php">Cancel</a></button>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
</body>
</html>