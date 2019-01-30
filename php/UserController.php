<?php
require_once 'RegisterUser.php';
    if(isset($_POST["create"])){
        $RegisterUser = new RegisterUser($_POST);
        $RegisterUser->connect();
    }