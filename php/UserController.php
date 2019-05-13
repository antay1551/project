<?php
require_once 'RegisterUser.php';
require_once 'LoginUser.php';
require_once 'Change.php';
require_once 'User.php';
session_start();

    if(isset($_GET["idUser"])){
        $user = new User($_SESSION["id_user"]);
        $user->deleteUser($_GET);
    }
    if(isset($_POST["create"])){
        $registerUser = new RegisterUser($_POST);
        $registerUser->connect();
        header("Location: http://project.test/auth.php");
    }
    if(isset($_POST["login"])){
        $loginUser = new LoginUser($_POST);
        $loginUser->connect();
        //header("Location: http://project.test/home.php");
    }
    if(isset($_POST["change"])){
        $change = new Change($_POST);
        $change->connect();
        header("Location: http://project.test/home.php");
    }