<?php
    require_once 'AddFridge.php';
    require_once 'Fridge.php';

    if(isset($_POST["addfridge"])){
        $addfridge = new AddFridge($_POST);
        $addfridge->connect();
        header("Location: http://project.test/home.php");
    }
    if(isset($_POST["addproduct"])){
        $addfridge = new Fridge($_SESSION["id_user"]);
        $addfridge->addProduct($_POST);
    }
    if(isset($_POST["adduser"])){
        $addfridge = new Fridge($_SESSION["id_user"]);
        $addfridge->addUser($_POST);
    }