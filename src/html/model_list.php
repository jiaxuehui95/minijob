<?php

include_once("db.php");
/*pb ...*/

    function listNewest()
    {
if ($conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web")) {
    // //设置客户端和连接字符集
    pg_query("set names utf8");
    $sql = "select * from demande ORDER BY start_time DESC limit {$length} offset {$offset};";
    if ($result) {
        $result = pg_query($db, $sql);
        pg_close($db);
        return $result;
    } else {
        print "ERREUR DB";
    }
    return false;
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