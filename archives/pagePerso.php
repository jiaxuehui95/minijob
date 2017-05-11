<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Page perso</title>
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
  <style type="text/css">
      .navbar-brand 
      {
          padding-top:0;
      }
      .headPicture
      {
          display: inline;
         float: right;
      }
     .container
     { 
         padding-top:0;
         height:250;
        background-image:url('img/pp_background.png');
        background-repeat:repeat-x;
        background-position:top;
     }

  </style>
  </head>
  <body>
   

<?php
    include 'config.php';
    include 'db.php';
    include_once 'Vue.php';
    include_once 'Modele.php';
    nav2();
        session_start();
if (isset($_SESSION['id_client'])) {
    $id_client = $_SESSION['id_client'];
} else {
    echo "errer00";
}

    $conn = db_connect();

    pg_query("set names utf8");
    $sql = "select * from client where id_client=$id_client";
    $result = pg_query($sql);
    $row = pg_fetch_array($result);
    ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="mainPage.php">recherche d'un Offre <span class="sr-only">(current)</span></a></li>
        <li><a href="demandePage.php">propose d'une demande </a></a></li>
      </ul>
       <ul class="nav navbar-nav navbar-right">
        <li><a href="logOut.php">déconnection</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          
          <li><a href="#">bonjour! &nbsp; <?php echo $_SESSION['username'];?></a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="container">
        <div class="row feature" >
            <div class=col-md-2>    
                <img class="img-circle" src="img/photo.png" height="100%" width="100%" padding-top="10">
            </div>
             <div class=col-md-10>
                <h1><?php echo $row['username'];?></h1>
                <h4><?php echo $row['nom'].' '.$row['prenom'].", niveau: ".$row['niveau'];?></h4>
            </div>
        </div>
        

         <ul class="nav nav-tabs" role="tablist" id="feature-tab">
            <li class="active"><a href="#tab-info_perso" role="tab" data-toggle="tab">Information</a></li>
            <li><a href="#tab-demande" role="tab" data-toggle="tab">Demande</a></li>
            <li><a href="#tab-commande" role="tab" data-toggle="tab">Commande</a></li>
        
        </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab-info_perso">
           <div class="row feature" >
                <div class=col-md-12>
                                <div style="background:#FFF;color:#000;border-radius:10px;"><?php echo "<br><p>  &nbsp; &nbsp; Nom: &nbsp;".$row['nom']."</p>".
                                "<p>   &nbsp; &nbsp; Prénom     :  &nbsp;".$row['prenom']."</p>".
                                "<p>   &nbsp; &nbsp; Naissance  :  &nbsp;".$row['naissance']."</p>".
                                "<p>   &nbsp; &nbsp; Pays       :  &nbsp;".$row['pays']."</p>".
                                "<p>   &nbsp; &nbsp; Ville      :  &nbsp;".$row['ville']."</p>".
                                "<p>   &nbsp; &nbsp; Adresse    : &nbsp;".$row['adresse']."</p>".
                                "<p>   &nbsp; &nbsp; Postal     : &nbsp;".$row['postal']."</p>".
                                "<p>   &nbsp; &nbsp; Téléphone  : &nbsp;".$row['telephone']."</p>".
                                "<p>   &nbsp; &nbsp; E-mail      : &nbsp;".$row['email']."</p>".
                                "<p>   &nbsp; &nbsp; Desciption  :  &nbsp;".$row['desciption']."</p>";
                                ?></div>
                </div>
            </div>
        </div>    
        <div class="tab-pane" id="tab-demande">
           <div class="row feature" >
                <div class=col-md-12>
                   <div style="background:#FFF;color:#000;border-radius:10px;"><?php
                        $conn = db_connect();
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
                        $sql = "select distinct * from demande where d_client=$id_client limit {$length} offset {$offset} ";

                        $result = pg_query($sql);
                        echo "<h1>&nbsp; &nbsp;List de Demande</h1>";
                        echo "&nbsp; &nbsp;<table class='table table-bordered table-hover table-striped'>";
                        echo "&nbsp; &nbsp;<thead><tr>";
                        echo "&nbsp; &nbsp;<th>Type</th>";
                        echo "&nbsp; &nbsp;<th>Description</th>";
                        echo "&nbsp; &nbsp;<th>Start</th>";
                        echo "&nbsp; &nbsp;<th>End</th>";
                        echo "&nbsp; &nbsp;<th>Applications</th>";
                        echo "&nbsp; &nbsp;</tr></thead><tbody>";
                    while ($row = pg_fetch_array($result)) {
                        echo "&nbsp; &nbsp;<tr>";
                        echo "<td>{$row['q_type']}</td>";
                        echo "<td>{$row['texte']}</td>";
                        echo "<td>{$row['start_time']}</td>";
                        echo "<td>{$row['deadline']}</td>";
                        if ($row['status'] == 0) {
                            echo '<td><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">voir les application</button></td></tr>';

                             tanchukuang();
                                appli($row['id_demande']);
                             tanchukuang_pied();
                        } else {
                            echo '<td>demande effectué </td></tr>';
                        }
                    }
                        echo "</tbody></table>";
                        //计算上一页和下一页
                        $prevpage = $pagenum - 1;
                        $nextpage = $pagenum + 1;

                        echo "<a class='button button-glow button-border button-rounded button-primary' href='pagePerso.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='pagePerso.php?page={$nextpage}#demande'>next</a>";
                        //释放连接资源
                        pg_close($conn);
                        ?>
                   </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane" id="tab-commande">
           <div class="row feature" >
                <div class=col-md-12>
                   <div style="background:#FFF;color:#000;border-radius:10px;"><?php
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
                        $sql = "select * from commande2 join application using(a_client,id_demande) join demande using(id_demande) where d_client=$id_client ";
                     //   $sql="select * from commande2 where id_demande=16";
                        $result = pg_query($sql);

                        echo "<h1>&nbsp; &nbsp;List de Commande validé </h1>";
                        echo "&nbsp; &nbsp;<table class='table table-bordered table-hover table-striped'>";
                        echo "&nbsp; &nbsp;<thead><tr>";
                        echo "&nbsp; &nbsp;<th>id_demande</th>";
                        echo "&nbsp; &nbsp;<th>Lien de votre demande</th>";
                        echo "&nbsp; &nbsp;<th>a_client</th>";
                         echo "&nbsp; &nbsp;<th>q_type</th>";

                        echo "&nbsp; &nbsp;</tr></thead><tbody>";
                    while ($row = pg_fetch_array($result)) {
                        echo "&nbsp; &nbsp;<tr>";
                        echo "<td>{$row['id_demande']}</td>";
                        echo "<td><a href='demande.php?id_demande={$row['id_demande']}'>Detail</a></td>";
                        echo "<td>{$row['a_client']}</td>";
                        echo "<td>{$row['q_type']}</td>";
                    //     echo "<td><a href=https://ensiie-tp-web-p8-mok0na.c9users.io/application.php?id_demende=".$row['id_demande'].">voir les application</a></td>"."</tr>";
                    }
                        echo "</tbody></table>";
                        //计算上一页和下一页
                        $prevpage = $pagenum - 1;
                        $nextpage = $pagenum + 1;

                        echo "<a class='button button-glow button-border button-rounded button-primary' href='pagePerso.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='pagePerso.php?page={$nextpage}#demande'>next</a>";
                        //释放连接资源
                        pg_close($conn);
                        ?>
                   </div>
                </div>
            </div>
        </div>
        
        
    </div>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>