<?php 

include_once("Vue.php");
//	include 'config.php';
//   include 'db.php';
include_once 'Modele.php';
function showCommande($id_client)
{
    $conn = db_connect();
    pg_query("set names utf8");
    $length = 5;
    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;
    $sqltot = "select count(*) from commande join application using(id_app,id_demande) join demande using(id_demande) where d_client=$id_client";
    $arrtot = pg_fetch_row(pg_query($sqltot));
    $pagetot = ceil($arrtot[0] / $length);
    if ($pagenum >= $pagetot) {
        $pagenum = $pagetot;
    }
    
    $offset = ($pagenum - 1) * $length;
    $sql = "select * from commande2 join demande using(id_demande) where d_client=$id_client ";
 
    $result = pg_query($sql);
    
    // echo "<h1>&nbsp; &nbsp;List de Commande validé </h1>";
    echo "&nbsp; &nbsp;<table class='table table-bordered table-hover table-striped'>";
    echo "&nbsp; &nbsp;<thead><tr>";
    echo "&nbsp; &nbsp;<th>titre</th>";
    echo "&nbsp; &nbsp;<th>Lien de votre demande</th>";
    echo "&nbsp; &nbsp;<th>candidat choisit</th>";
    echo "&nbsp; &nbsp;<th>q_type</th>";

    echo "&nbsp; &nbsp;</tr></thead><tbody>";
    while ($row = pg_fetch_array($result)) {
        echo "&nbsp; &nbsp;<tr>";
        echo "<td>{$row['title']}</td>";
        echo "<td><a href='demande.php?id_demande={$row['id_demande']}'>Detail</a></td>";
        $sql2="select * from client where id_client=".$row['a_client'];
        $result2 = pg_query($sql2);    
        $row2 = pg_fetch_array($result2);
        echo "<td>{$row2['username']}</td>";
        echo "<td>{$row['q_type']}</td>";
        //     echo "<td><a href=https://ensiie-tp-web-p8-mok0na.c9users.io/application.php?id_demende=".$row['id_demande'].">voir les application</a></td>"."</tr>";
    }
    echo "</tbody></table>";

    $prevpage = $pagenum - 1;
    $nextpage = $pagenum + 1;

   // echo "<a class='button button-glow button-border button-rounded button-primary' href='pagePerso.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='pagePerso.php?page={$nextpage}#demande'>next</a>";

    pg_close($conn);
    }
    
    function showAcception($id_client)
    {
         	session_start();
        	if(isset($_SESSION['id_client'])){
    	    $id_client=  $_SESSION['id_client'];
        	}
        	else
        	{echo "error00";}
    
        $conn = db_connect();
        pg_query("set names utf8");
    
        $sql = "select * from application where a_client=$id_client";//所有申请
        $result = pg_query($sql);
       
                         
        echo "&nbsp; &nbsp;<table class='table table-bordered table-hover table-striped'>";
        echo "&nbsp; &nbsp;<thead><tr>";
        echo "&nbsp; &nbsp;<th>titre</th>";
        echo "&nbsp; &nbsp;<th>Lien de cette demande</th>";
        echo "&nbsp; &nbsp;<th>status</th>";

        echo "&nbsp; &nbsp;</tr></thead><tbody>";
        while ($row = pg_fetch_array($result)) {//row：所有申请
            echo "&nbsp; &nbsp;<tr>";
            $id_demande=$row['id_demande'];
            $sql2="select * from demande where id_demande=$id_demande";//为了 title
            $result3 = pg_query($sql2);//res3 title
            $row3=pg_fetch_array($result3);
            echo "<td>{$row3['title']}</td>";
            $sqlc="select * from commande2 where id_demande=$id_demande";//生成commande的
            $res = pg_query($sqlc);
            echo "<td><a href='demande.php?id_demande={$row['id_demande']}'>Detail</a></td>";
            if($rowc = pg_fetch_array($res))
            {
                if($rowc['a_client']==$id_client)
                {
                    echo '<td><span class="w3-tag w3-green w3-round">validé</span></td>';
                }
                 else
                 {
                     echo '<td><span class="w3-tag w3-red w3-round">échec </span></td>';
                 }
            }
            else
            {
               echo '<td><span class="w3-tag w3-yellow  w3-round">à confirmé</span></td>';
                           
            }
        }
        
        echo "</tbody></table>";
        $prevpage = $pagenum - 1;
        $nextpage = $pagenum + 1;
       /* echo "<a class='button button-glow button-border button-rounded button-primary' 
        href='persoPage2.php?page={$prevpage}#commande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum} 
        &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary'
        href='persoPage2.php?page={$nextpage}#commande'>next</a></br>&nbsp";
        */
     //   echo "<a class='button button-glow button-border button-rounded button-primary' href='persoPage2.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='persoPage2.php?page={$nextpage}#demande'>next</a>";

        pg_close($conn);
    }
?>
                        
                        