<?php
/* Activation du compte*/
require_once("config.php");
require_once("db.php");

$verify = $_GET['token'];
$nowtime = time();

$query = "select id_client from client where status!='1' and token='$verify'";
$db = db_connect();
$result = db_query($db, $query);
$row = db_fetch($result);
if ($row != false) {
    $res = db_query($db, "update client set status=1 where id_client=".$row['id_client']);
    if ($res) {
        $msg = 'error.';
        $msg = 'Votre compte a été activé！';
    } else {
        $msg = 'error.';
    }

    echo $msg;
}
