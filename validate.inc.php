<?php

require_once "config.inc.php";

if (isset($_POST)){
    if ($_POST['form'] == "register"){
        if (empty($_POST['username']) ||
        empty($_POST['password']) ||
        empty($_POST['email'])) {
            exit('Each Field is Required');
        }
    
        else {
    
            $result = $con->query("SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
            if($result->num_rows > 0){
                exit('This Email Belongs to Another Account');
            }
            else {
                exit("success");
            }
    
        }
    }

    if ($_POST['form'] == "login"){
        if (empty($_POST['password']) ||
        empty($_POST['email'])) {
            exit('Each Field is Required');
        }
    
        else {
    
            $result = $con->query("SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
            if($result->num_rows == 0){
                exit('Wrong Email or Password');
            }
            else {
                $data = $result->fetch_assoc();
                if(md5($_POST['password']) == $data['password']){
                    exit('success');
                }
                else {
                    exit('Wrong Email or Password');
                }
            }
    
        }
    }
}