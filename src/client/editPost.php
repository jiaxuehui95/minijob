<?php

session_start();
include_once("/bin/db.php");
include_once ("/bin/Modele.php");

$client = $_SESSION['id_client'];
$type = $_POST['categorie'];
$texte = test_input(pg_escape_string(utf8_encode($_POST['description'])));
$deadline = test_input($_POST['deadline']);
/*$date =date_create_from_format("Y-m-d",$_POST['deadline']);
$deadline = date_format($date,"d/m/Y");
*/
$title = test_input(pg_escape_string(utf8_encode($_POST['sujet'])));
$lieu = $_POST['lieu'];

echo $title." titre</br>";
echo $texte." texte</br>";
echo $lieu." lieu</br>";
echo $deadline." deadline</br>";

if (isset($_SESSION['id_client'])) {
    if (isset($_POST['description'])) {
        echo "\n haha";
        $db = db_connect();
        if ($db) {
            $req = "UPDATE demande(d_client,q_type,title,place,status,start_time,deadline,texte)" .
                'VALUES (' . $client . ',\'' . $type . '\',\'' .$title. '\',\'' .$lieu.'\',0,\'' .
                date("Y-m-d H:i:s") . '\',\'' . $deadline . '\',\'' . $texte .'\');';
            echo $req;
            $sql = db_query($db, $req);
            if ($sql) {
                  $url = "mainPage.php";
                  Header("Location: $url");
            } else {
                echo "échec requete";
            }
        } else {
            echo "échec co bd";
        }
    } else {
        echo "échec description vide";
    }
} else {
    echo "échec connexion";
}