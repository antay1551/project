<?php
    session_start();
    session_destroy();
    header("Location: http://project.test/home.php");