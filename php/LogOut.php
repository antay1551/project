<?php
//print(11121);
    session_start();
    session_destroy();
    header("Location: http://project.test/auth.php");