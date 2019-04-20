<?php
    require_once 'connection.php';

    $con = Connection::get_instance()->dbh;
    $con->query("Delete from bookmark where id = '".$_GET["idProduct"]."'");
    header("Location: http://project.test/fridge.php?id=".$_GET['id']);

