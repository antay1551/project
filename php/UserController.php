<?php
require_once 'RegisterUser.php';
require_once 'LoginUser.php';

    if(isset($_POST["create"])){
        $registerUser = new RegisterUser($_POST);
        $registerUser->connect();
    }
    if(isset($_POST["login"])){
        print_r($_POST);
        $loginUser = new LoginUser($_POST);
        $loginUser->connect();
        print($_SESSION["id_user"]);
    }