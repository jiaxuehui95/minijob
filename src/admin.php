<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>mini job</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	 <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	  <link href="css/button.css" rel="stylesheet">
	  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  </head>
  <body>
      <div class="container-fluid">
		    <!--row 1     -->
		<div class="row">
			<div class="col-md-12">
			<?php
                    ///////authen/////////
                session_start();
            if ($_SESSION['status'] != 2) {
                $url = "mainPage2.php";
                Header("Location: $url");
            } else {
                echo '<h1>admin</h1><br/>';
                echo ' Bonjour!, '. $_SESSION['username'];
                echo '&nbsp&nbsp&nbsp&nbsp&nbsp';
                echo ' <a class="button button-glow button-border button-rounded button-primary" href="logOut.php" >Déconnection </a><br/>';
            }
                //////authen//////
            ?>
            </div>
        </div>
         <br/>
            <div>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
    
        
        <div class="row">
            <div class="col-md-12">
                <?php

                $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
                pg_query("set names utf8");
                $length = 5;
                $pagenum = @$_GET['page'] ? $_GET['page'] : 1;
                $sqltot = "select count(*) from demande";
                $arrtot = pg_fetch_row(pg_query($sqltot));
                $pagetot = ceil($arrtot[0] / $length);
                if ($pagenum >= $pagetot) {
                    $pagenum = $pagetot;
                }
                $offset = ($pagenum - 1) * $length;
                $sql = "select * from demande limit {$length} offset {$offset} ";
                $result = pg_query($sql);
                echo "<h1>List de Demande</h1>";
                echo "<table class='table table-bordered table-hover table-striped'>";
                echo "<thead><tr>";
                echo "<th>id_demande</th>";
                echo "<th>Type</th>";
                echo "<th>Description</th>";
                echo "<th>Start</th>";
                echo "<th>End</th>";
                echo "<th>Lien</th>";
                echo "<th>Delete</th>";
                echo "</tr></thead><tbody>";
                while ($row = pg_fetch_array($result)) {
                    $id_demande = $row['id_demande'];
                    echo "<tr>";
                     echo "<td>{$row['id_demande']}</td>";
                    echo "<td>{$row['q_type']}</td>";
                    echo "<td>{$row['texte']}</td>";
                    echo "<td>{$row['start_time']}</td>";
                    echo "<td>{$row['deadline']}</td>";
                    echo "<td><a href='demande.php?id_demande={$id_demande}'>Detail</a></td>";
                    echo "<td><a href='admin/delDemande.php?id_demande={$id_demande}'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";

                $prevpage = $pagenum - 1;
                $nextpage = $pagenum + 1;
                echo "<br/><p> Page total : {$pagetot}</p><br/>";
                echo "<a class='button button-glow button-border button-rounded button-primary' href='mainPage.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='admin.php?page={$nextpage}#demande'>next</a> ";

                pg_close($conn);
?>
            </div>
            <br/>
            <div>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <?php

                    $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
                    pg_query("set names utf8");
                    $length = 5;
                    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;
                    $sqltot = "select count(*) from client";
                    $arrtot = pg_fetch_row(pg_query($sqltot));
                    $pagetot = ceil($arrtot[0] / $length);
                    if ($pagenum >= $pagetot) {
                        $pagenum = $pagetot;
                    }
                    $offset = ($pagenum - 1) * $length;
                    $sql = "select * from client limit {$length} offset {$offset} ";
                    $result = pg_query($sql);
                    echo "<h1>List de client</h1>";
                    echo "<table class='table table-bordered table-hover table-striped'>";
                    echo "<thead><tr>";
                    echo "<th>id_client</th>";
                    echo "<th>username</th>";
                    echo "<th>email</th>";
                    echo "<th>niveau</th>";
                    echo "<th>Delete</th>";
                    echo "</tr></thead><tbody>";
                    while ($row = pg_fetch_array($result)) {
                        $id_client = $row['id_client'];
                        echo "<tr>";
                         echo "<td>{$row['id_client']}</td>";
                        echo "<td>{$row['username']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['niveau']}</td>";
                        echo "<td><a href='admin/delClient.php?id_client={$id_client}'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";

                    $prevpage = $pagenum - 1;
                    $nextpage = $pagenum + 1;
                    echo "<br/><p> Page total : {$pagetot}</p><br/>";
                    echo "<a class='button button-glow button-border button-rounded button-primary' href='mainPage.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='admin.php?page={$nextpage}#demande'>next</a> ";

                    pg_close($conn);
?>
            </div>
             <br/>
            <div>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
    
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                    <?php

                    $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
                    pg_query("set names utf8");
                    $length = 5;
                    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;
                    $sqltot = "select count(*) from application";
                    $arrtot = pg_fetch_row(pg_query($sqltot));
                    $pagetot = ceil($arrtot[0] / $length);
                    if ($pagenum >= $pagetot) {
                        $pagenum = $pagetot;
                    }
                    $offset = ($pagenum - 1) * $length;
                    $sql = "select * from application limit {$length} offset {$offset} ";
                    $result = pg_query($sql);
                    echo "<h1>List de application</h1>";
                    echo "<table class='table table-bordered table-hover table-striped'>";
                    echo "<thead><tr>";
                    echo "<th>id_app</th>";
                    echo "<th>a_client</th>";
                    echo "<th>id-demande</th>";
                    echo "<th>lien de demande</th>";
                    echo "<th>texte</th>";
                    echo "<th>Delete</th>";
                    echo "</tr></thead><tbody>";
                    while ($row = pg_fetch_array($result)) {
                        $id_demande = $row['id_demande'];
                        echo "<tr>";
                         echo "<td>{$row['id_app']}</td>";
                         echo "<td>{$row['a_client']}</td>";
                        echo "<td>{$row['id_demande']}</td>";
                        echo "<td><a href='demande.php?id_demande={$id_demande}'>Detail</a></td>";
                        echo "<td>{$row['texte']}</td>";
                        echo "<td><a href='admin/delApp.php?id_app={$row['id_app']}'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";

                    $prevpage = $pagenum - 1;
                    $nextpage = $pagenum + 1;
                    echo "<br/><p> Page total : {$pagetot}</p><br/>";
                    echo "<a class='button button-glow button-border button-rounded button-primary' href='mainPage.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='admin.php?page={$nextpage}#demande'>next</a> ";

                    pg_close($conn);
?>
   <br/>
            <div>----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</div>
    
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                    <?php

                    $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
                    pg_query("set names utf8");
                    $length = 5;
                    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;
                    $sqltot = "select count(*) from commande2";
                    $arrtot = pg_fetch_row(pg_query($sqltot));
                    $pagetot = ceil($arrtot[0] / $length);
                    if ($pagenum >= $pagetot) {
                        $pagenum = $pagetot;
                    }
                    $offset = ($pagenum - 1) * $length;
                    $sql = "select * from commande2 limit {$length} offset {$offset} ";
                    $result = pg_query($sql);
                    echo "<h1>List de commande</h1>";
                    echo "<table class='table table-bordered table-hover table-striped'>";
                    echo "<thead><tr>";
                    echo "<th>id_commande2</th>";
                    echo "<th>id_app</th>";
                    echo "<th>id-demande</th>";
                    echo "<th>lien de demande</th>";
                    echo "<th>Delete</th>";
                    echo "</tr></thead><tbody>";
                    while ($row = pg_fetch_array($result)) {
                        $id_demande = $row['id_demande'];
                        echo "<tr>";
                        echo "<td>{$row['id_commande2']}</td>";
                         echo "<td>{$row['id_app']}</td>";
                        echo "<td>{$row['id_demande']}</td>";
                        echo "<td><a href='demande.php?id_demande={$id_demande}'>Detail</a></td>";
                        echo "<td><a href='admin/delComm.php?id_app={$row['id_commande2']}'>Delete</a></td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";

                    $prevpage = $pagenum - 1;
                    $nextpage = $pagenum + 1;
                    echo "<br/><p> Page total : {$pagetot}</p><br/>";
                    echo "<a class='button button-glow button-border button-rounded button-primary' href='mainPage.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='admin.php?page={$nextpage}#demande'>next</a> ";

                    pg_close($conn);
?>
                
            </div>
        </div>      
    </div>
    </body>
</html>