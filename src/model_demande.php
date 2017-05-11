<?php
include_once("Vue.php");
include_once("db.php");

function getDemand($id_demande)
{
    $query = "SELECT * FROM demande WHERE id_demande=".$id_demande;
    $db = db_connect();
    $result = db_query($db, $query);
    if (!$result)
    {
        return false;
    }
    else
    return $result;
}

function checkapp($id_client,$id_demande)
{
    $db = db_connect();
    $query = "select * from application where a_client=".$id_client." and id_demande=".$id_demande;
    $result = db_query($db, $query);
    /*db_close($db);*/
    if($row = db_fetch($result))
    {
        return true;
    }
    else{
        return false;
    }
}

function postApplication($id_client,$id_demande,$text)
{
    $db = db_connect();
    if(!checkapp($id_client,$id_demande))
    {
    $sql = "INSERT INTO application (a_client,id_demande,texte) VALUES ($id_client, $id_demande, '$text')";
    //echo $query;
    $result = db_query($db, $sql);
    return false;
    }
    else
    {
        $sql1= "UPDATE application SET texte='$text' WHERE a_client =".$id_client." AND id_demande= ".$id_demande;
        $result = db_query($db, $sql1);
       /* db_close($db);*/
         echo "$sql1";
    if (!$result) {
        return false;
    }
    else 
        return true;
    }
    echo "$sql1";
}

function getVille($postal)
{
    $db = db_connect();
    $query = "select ville_nom from ville where code_postal='{$postal}';";
    $result = db_query($db, $query);
    /*db_close($db);*/
    if($row = db_fetch($result))
    {
        return $result['ville_nom'];
    }
    else
    {
        return false;
    }
}