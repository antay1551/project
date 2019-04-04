<?php
    session_start();
    require_once 'User.php';
    $user = new User($_SESSION['id_user']);
    $user->connect();
    header("Location: http://project.test/account.php");


