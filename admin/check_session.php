<?php

session_start();

if($_SESSION['login_status']!=true)
{
    header('location:logout.php');
}
?>