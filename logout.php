<?php
session_start();

if(isset($_SESSION["user_id"]))
{
    unset($_SESSION["user_id"]);
}

header("Cache-Control: no-cache, must-revalidate");
header("Location: login.php");
die;