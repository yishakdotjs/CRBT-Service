<?php

require_once "config.inc.php";


if(isset($_POST)){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $con->query("INSERT INTO users (username, email, password)
    VALUES ('$username', '$email', '$password')");

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: index.php");
}