<?php
session_start();

$BASE_URL = "http://localhost/crbt";

if(!isset($_SESSION['lang'])){
    $_SESSION['lang'] = 'en';
}
else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])){
    if ($_GET['lang'] == 'en'){
        $_SESSION['lang'] = 'en';
    }
    else if($_GET['lang'] == 'am') {
        $_SESSION['lang'] = 'am';
    }
}

require_once ( "languages/" . $_SESSION['lang'] . ".php");


$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "crbt";

$con = new mysqli($DB_HOST, $DB_USER,$DB_PASS, $DB_NAME);