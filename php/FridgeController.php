<?php
    require_once 'AddFridge.php';
    if(isset($_POST["addfridge"])){
        $addfridge = new AddFridge($_POST);
        $addfridge->connect();
        header("Location: http://project.test/home.php");
    }