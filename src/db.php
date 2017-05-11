<?php
include_once("config.php");

function db_connect()
{
    global $nom_hote, $nom_user, $nom_base, $mdp;
    return pg_connect("host=$nom_hote user=$nom_user dbname=$nom_base password=$mdp");
}

function db_query($db, $query)
{
    return pg_query($db, $query);
}

function db_transaction($db, $query_array)
{
    pg_query($db, "BEGIN");
    $res = 1;
    foreach ($query_array as $req) {
        $res *= pg_query($db, $req);
    }
    if ($res == 0) {
        pg_query($db, "ROLLBACK");
    } else {
        pg_query($db, "COMMIT");
    }
}

function db_fetch($rep)
{
    return pg_fetch_assoc($rep);
}


function db_count($rep)
{
    return pg_num_rows($rep);
}

function db_close($db)
{
    return pg_close($db);
}
