<?php

require_once "config.inc.php";

if(isset($_POST)){
    $email = $_POST['email'];

    $result = $con->query("SELECT * FROM users WHERE email='$email'");
    $data = $result->fetch_assoc();
    

    $_SESSION['username'] = $data['username'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['password'] = $data['password'];

    header("Location: index.php");
}