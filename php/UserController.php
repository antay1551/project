<?php
require_once 'RegisterUser.php';
require_once 'LoginUser.php';

    if(isset($_POST["create"])){
        $registerUser = new RegisterUser($_POST);
        $registerUser->connect();
    }
    if(isset($_POST["login"])){
        $loginUser = new LoginUser($_POST);
        $loginUser->connect();
        header("Location: http://project.test/home.php");
    }