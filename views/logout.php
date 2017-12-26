<?php
    session_start();    
    $_SESSION['userid'] = NULL;
    $_SESSION['name'] = NULL;
    session_destroy();
    unset($_SESSION);
    header('location:login.php');
?>