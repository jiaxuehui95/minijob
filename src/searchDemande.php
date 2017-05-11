<?php
// C'est l'authentification de client pour toutes page.
include_once 'db.php';
include_once 'Modele.php';

session_start();

$_SESSION['search']= $_POST['search'];


if(($_POST['start']==null)||($_POST['end']==null)){
    unset($_SESSION['start']);
    unset($_SESSION['end']);
}else{
    $_SESSION['start']= $_POST['start'];
    $_SESSION['end']=  $_POST['end'];
}


$url = "mainPage2.php#Fdemande";
Header("Location: $url");
 
