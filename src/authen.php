<?php
// C'est l'authentification de client pour toutes page.
include_once 'db.php';
include_once 'Modele.php';
session_start();
if ((! isset($username))||(! isset($password))) {
    $email = $_POST['email'];
    $password = $_POST['password'];
  // echo $email.$password;
    $con = db_connect();
    if ($con) {
        $req = "SELECT * FROM client WHERE email='".test_input($email)."' and password='".test_input($password)."'";
        $res = db_query($con, $req);
        $num = db_count($res);
        if ($num < 1) {
             $url = "mainPage2.php";
            Header("Location: $url");
            // echo 'connecte failed';
        } else {
            $row = db_fetch($res);
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['id_client'] = $row['id_client'];
            $_SESSION['status'] = $row['status'];
            $url = "mainPage2.php";
             echo 'connected';
             echo $_SESSION['username'];
             echo $_SESSION['password'];
            if ($_SESSION['status'] == 2) {
                $url = "admin.php";
                Header("Location: $url");
            } 
            Header("Location: $url");
        }
    } else {
        echo 'Server failed';
    }
}
