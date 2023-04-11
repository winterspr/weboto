<?php
    session_start();
    unset($_SESSION['id']);
    unset($_SESSION['name']);
    setcookie('remember', null, -2);
    header('location:index.php');