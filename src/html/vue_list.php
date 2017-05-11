<?php

include_once("db.php");

function getVille($postal)
{
    $db = db_connect();
    $query = "select * from ville where code_postal='{$postal}';";
    $result = db_query($db, $query);
    echo $result['ville_nom'];
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

function showListDemand($result)
{
    echo '<ul class="w3-ul">';
    while ($row = pg_fetch_array($result)) {
        $id_demande = $row['id_demande'];

        echo "<li>";
        echo "<div>";
        if ($row['title']!='')
        {echo "<h5 class=\" w3-opacity\"><a href=\"demande.php?id_demande={$id_demande}\"></a><b>{$row['title']}</b></h5>";}
        else
        {echo "<h5 class=\" w3-opacity\"><a href=\"demande.php?id_demande={$id_demande}\"></a><b>Sans Titre</b></h5>";}
        echo "<h6 class=\"w3-text-red\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>{$row['start_time']}</h6>";
        if ($row['place']!=null)
        {
           // echo getVille($row['place']);
        echo "<h6><i class=\"fa fa-map-marker fa-fw w3-margin-right\"></i>{$row['place']}</h6>";
        }
        echo "<p>Catégorie  : {$row['q_type']}</p>";
        echo "<p>".substr($row['texte'],0,20)."...</p>";
        echo "</div>";
        echo "</li>";
    }
    echo "</ul>";
    echo "</div>";
}

function showListDemand_type($result)
{
    echo '<ul class="w3-ul">';
    while ($row = pg_fetch_array($result)) {
        $id_demande = $row['id_demande'];

        echo "<li>";
        echo "<div>";
        if ($row['title']!='')
            {echo "<h5 class=\" w3-opacity\"><a href=\"demande.php?id_demande={$id_demande}\"></a><b>{$row['title']}</b></h5>";}
        else
            {echo "<h5 class=\" w3-opacity\"><a href=\"demande.php?id_demande={$id_demande}\"></a><b>Sans Titre</b></h5>";}
        echo "<h6 class=\"w3-text-red\"><i class=\"fa fa-calendar fa-fw w3-margin-right\"></i>{$row['start_time']}</h6>";
        if ($row['place']!=null)
        {
        echo "<h6><i class=\"fa fa-map-marker fa-fw w3-margin-right\"></i>{$row['place']}</h6>";
        }
        echo "<p>Catégorie  : {$row['q_type']}</p>";
        echo "<p>".substr($row['texte'],0,20)."...</p>";
        echo "</div>";
        echo "</li>";
    }
    echo "</ul>";
   
}
