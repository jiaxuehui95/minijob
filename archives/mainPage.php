
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
	  <link href="css/li_hover.css" rel="stylesheet">
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
                include 'Vue.php';
                nav();
                    ///////authen/////////
                session_start();
            if (isset($_SESSION['username'])) {
                if ($_SESSION['status'] == 2) {
                     $url = "admin.php";
                    Header("Location: $url");
                }
                tab();
                echo ' Bonjour! , '. $_SESSION['username'];
                echo '&nbsp&nbsp&nbsp&nbsp&nbsp';
                echo ' <a class="button button-glow button-border button-rounded button-primary" href="pagePerso.php" >votre compte </a>';
                echo ' <a class="button button-glow button-border button-rounded button-primary" href="logOut.php" >Déconnection </a><br/>';
            } else {
                tab();
                tab();
                tab();
                echo 'Déconnection <br/>';
            }
                //////authen//////

            ?>
            </div>
        </div>
        <div class="row">
        <div class="col-md-4">
<!--			<h3>
                XXX
            </h3>
            <p>
                XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
            </p>
            <br/>
            <p>
                XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
        </p>--> 
        </div>

        <div class="col-md-8">
        </div>
    </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <!--row 2222222222222222222222222222222222222     -->
    <div class="row">
        <div class="col-md-12">
            <div class="carousel slide" id="carousel-81469">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel-81469">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-81469">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-81469" class="active">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img alt="Carousel Bootstrap First" src="img/fleche.png">
                        <div class="carousel-caption">
                            <h4>
                                First Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="Carousel Bootstrap Second" src="img/fleche.png">
                        <div class="carousel-caption">
                            <h4>
                                Second Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                    <div class="item active">
                        <img alt="Carousel Bootstrap Third" src="img/fleche.png">
                        <div class="carousel-caption">
                            <h4>
                                Third Thumbnail label
                            </h4>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                        </div>
                    </div>
                </div> <a class="left carousel-control" href="#carousel-81469" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-81469" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
        <br/>
        <br/>
        <br/>
        <!--row 3333333333333333333333333333333333333333333     -->
    <div class="row">
        <!--    <div class="col-md-3">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                     
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                         <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> <a class="navbar-brand" href="#">Brand</a>
                </div>
            
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="#">Link</a>
                        </li>
                        <li>
                            <a href="#">Link</a>
                        </li>

                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control">
                        </div>
                        <br/>
                        <br/>
                        <button type="submit" class="button button-raised button-primary button-pill">
                            Submit
                        </button>
                    </form>

                </div>
                
            </nav>  
        </div>-->   
        <div class="col-md-12">
        <!--    <div class="btn-group btn-group-lg">
                 
                <button class="btn btn-default" type="button">
                    <em class="glyphicon glyphicon-align-left"></em> Left
                </button> 
                <button class="btn btn-default" type="button">
                    <em class="glyphicon glyphicon-align-center"></em> Center
                </button> 
                <button class="btn btn-default" type="button">
                    <em class="glyphicon glyphicon-align-right"></em> Right
                </button> 
                <button class="btn btn-default" type="button">
                    <em class="glyphicon glyphicon-align-justify"></em> Justify
                </button>
            </div>-->   
            <a name="demande"></a>
            <div id="demande">
<?php
//	include 'config.php';
   // include 'db.php';
  //  include 'GestionDemande.php';
    //$conn = db_connect();
     $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
    // //连接pg数据库

    // //设置客户端和连接字符集
    pg_query("set names utf8");


    //limit要求参数
    $length = 5;
    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;

    //数据总行数
    $sqltot = "select count(*) from demande";
    $arrtot = pg_fetch_row(pg_query($sqltot));
    $pagetot = ceil($arrtot[0] / $length);

    //限制页数
if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}
    $offset = ($pagenum - 1) * $length;

    //从数据库获取数据
    $sql = "select * from demande limit {$length} offset {$offset} ";
    $result = pg_query($sql);

    echo "<h1>List de Demande</h1>";
    echo "<table class='table table-bordered table-hover table-striped'>";
     echo "<thead><tr>";
        echo "<th>Type</th>";
        echo "<th>Description</th>";
        echo "<th>Start</th>";
        echo "<th>End</th>";
        echo "<th>Lien</th>";
        echo "</tr></thead><tbody>";
while ($row = pg_fetch_array($result)) {
    $id_demande = $row['id_demande'];
    echo "<tr>";
    echo "<td>{$row['q_type']}</td>";
    echo "<td>{$row['texte']}</td>";
    echo "<td>{$row['start_time']}</td>";
    echo "<td>{$row['deadline']}</td>";
    echo "<td><a href='demande.php?id_demande={$id_demande}'>Detail</a></td>";
    echo "</tr>";
}
    echo "</tbody></table>";

    //计算上一页和下一页
    $prevpage = $pagenum - 1;
    $nextpage = $pagenum + 1;

    echo "<a class='button button-glow button-border button-rounded button-primary' href='mainPage.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum}  &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary' href='mainPage.php?page={$nextpage}#demande'>next</a>";
    //释放连接资源
    pg_close($conn);
?>

            </div>
        </div>
    </div>
        <br/>
        <br/>
        <br/>
    <div class="row">
        <div class="col-md-4">
            <a name="end"></a>
            <address>
                 <strong>EMJ, Inc.</strong><br> 1 RUE de la Résistance <br> 91000 Evry, France<br> <abbr title="Phone">P:</abbr> 07 83 66 53 46
            </address>
        </div>
        <div class="col-md-4">
            <ul>
<!--				<li>
                    Lorem ipsum dolor sit amet
                </li>
                <li>
                    Consectetur adipiscing elit
                </li>
                <li>
                    Integer molestie lorem at massa
                </li>
                <li>
                    Facilisis in pretium nisl aliquet
                </li>
                <li>
                    Nulla volutpat aliquam velit
                </li>
                <li>
                    Faucibus porta lacus fringilla vel
                </li>
                <li>
                    Aenean sit amet erat nunc
                </li>
                <li>
                    Eget porttitor lorem
                </li> -->
            </ul>
        </div>
        <div class="col-md-4">
            <blockquote>
                <p>
                     Cet site est formidable !
                </p> <small> <cite>TingTing</cite></small>
            </blockquote>
        </div>
    </div>
</div>

    <script>
    
    </script>
     <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>