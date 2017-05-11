<?php
session_start();
unset($_SESSION['username']);
session_destroy();
$url = "mainPage2.php";
Header("Location: $url");
