<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['email']);
unset($_SESSION['password']);

header("Location: index.php");