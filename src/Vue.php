<?php

include "Modele.php";

function enTete($titre)
{
    print "<!DOCTYPE html>\n";
    print "<html>\n";
    print "  <head>\n";
    print "    <meta charset=\"utf-8\" />\n";
    print "    <title>$titre</title>\n";
    print "    <link rel=\"stylesheet\" href=\"tpStyle.css\"/>\n";
    print "  </head>\n";

    print "  <body>\n";
    print "    <header><h1> $titre </h1></header>\n";
}

function entete_Bs($titre)
{
    print "<!DOCTYPE html>\n";
    print "<html lang =\"fr\" >";
    print "   <head >\n";
    print "       <title > $titre  </title >\n";
    print "           <meta charset = \"utf-8\" >\n
               <meta name = \"viewport\" content = \"width=device-width, initial-scale=1\" >
               <link rel = \"stylesheet\" href = \"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" >
                <script src = \"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" ></script >
           </head >
            <body >";
}

function pied()
{
    print "</body>";
    print "</html>";
}


function accueil()
{
    echo '
    <!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
    <style>
         span {
         font-family: \'Gloria Hallelujah\', cursive;
       
      }
    </style>
    <meta charset="UTF-8">
    <link href="css/accueil.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <title>Title</title>
</head>
<body >
<div>
    <img class="logo" src="img/logo.png" alt="logo de mini">
</div>
<br/>
<br/>
<br/>
<div class="main">
    <img class="background" src="img/time$.gif" alt="background">
</div>
<br/>
<br/>
<br/>
<div style="text-align: center">
    <div id="intro"><span>Cliquer!</span></div>
    <div class="div-inline"><img style="width: 100px" src="img/fleche.png" alt="fleche"/> </div>
    <div class="div-inline main"> <a href="mainPage.php" class="rok"></a></div>
</div>


</body>
</html>
    ';
}
function nav2()
{
    echo '
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="accueil.php">
       <img class="Brand" alt="Brand" src="img/logo.png" height="50" width="100">
      </a>
    </div>
    ';
}

function nav()
{
    echo '
    <div class="navbar navbar-inverse ">
					<div class="navbar-inner">
						<div class="container">
							<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</a>
							<a class="brand" href=" "><img class="css/logo" src="img/logo.png" alt="responsive Mega Menu" /></a>
						</div><!-- Container -->
					</div><!-- Nav Bar - Inner -->
				</div><!-- Nav Bar -->
				<ul class="nav navbar-nav">
					<a href="mainPage.php" class="button button-glow button-border button-rounded button-primary">Home</a>
						<button class="button button-glow button-border button-rounded button-primary" onclick="document.getElementById(\'log\').style.display=\'block\'">Connexion</button>
					 <a href="SignUp.php" class="button button-glow button-border button-rounded button-primary">Créer mon compte</a>
				 	<a href="#end" class="button button-glow button-border button-rounded button-primary">contact</a>
				 	<div id="log">
  						<form action="authen.php" method="post">
  							<h3 >Connectez-vous à MINIJOB</h3>
    						<div class="form-group">
      							<label for="email">E-mail</label>
    							<span id="user" class="error"> </span>
    					  		<input type="text" class="form-control" name="email"
        							 id="email" placeholder="E-mail" onblur=\'checkName()\' required />
    						</div>
  				    		<div class="form-group">
     							 <label for="password">Mot de passe</label>
     							 <span id="psword" class="error"> </span>
     					   		 <input type="password" class="form-control"
        							name="password"
        							id="password" placeholder="Mot de passe" onblur=\'checkPassword()\' required />
    						</div>
  					    	<input type="submit" class="button button-glow button-border button-rounded button-primary" value="Connexion"  />
    						<br/>
    						<p class="text-success" ><a href="register.html">>>Pas encore membre ? Inscrivez-vous !</a></p>
  					    </form>
  						<div id="close" >
    						<span onclick="document.getElementById(\'log\').style.display=\'none\'">fermer</span>
  						</div>
					</div>
				</ul>
						
				<script>
					 var checkName=function() {
						 document.getElementById("user").innerHTML ="";
						 var name = eval(document.getElementById(\'email\')).value;
						  if (name.length > 30 || name.length < 1)
						   document.getElementById("user").innerHTML = "E-mail longueur entre 1 et 30 caractères！" ;
					}
					var checkPassword = function(){
    					document.getElementById("psword").innerHTML ="";
				    	var name = eval(document.getElementById(\'password\')).value;
    					if (name.length > 16 || name.length < 4)
    						document.getElementById("psword").innerHTML="Mot de passe longueur entre 4 et 16 caractères！" ;
					}
				</script>';
}

/*à modifier*/
function vue_connexion()
{

    echo '<section>
        <p> Bonjour, bienvenue sur l\'application minijobs.
        Commencez par vous authentifier </p>

        <br/>

        <form action="loginPage.php" method="post">
            <label>Entrez votre mot de passe :</label> <input type="password" name="mdp" size="8"/><br/>
            <input type="submit" value="Valider"/>
        </form>
        </section>';
}
/*function vue_application {

    echo '<section>

        </section>';

}*/

/*générer le formulaire pour s'inscrire nom, prenom, username, password, email,telephone(facultatif),naissance, adresse, postal, ville, pays, description  */
function vue_inscription()
{
}

function vue_offre()
{
}

/*? à diviser en mini fonction*/
function vue_user()
{
}


/*
*demande
*/

/** ajout_champ_test
 * @param $nom
 * @param $id
 * @param $for
 * @param $value
 * @param $array
 */


function ajout_champ_test($type_balise, $type, $nom, $placeholder, $id, $for, $class, $row, $description)
{
    print '<div class="form-group">
            <label class="control-label col-sm-2 " for="'."$for ".'"> '.$nom.'</label>
            <div class="col-sm-10">
                <'.$type_balise.' class="'."$class".'"';
    if ($type != "") {
        print ' type="'.$type.'"';
    }
    print ' id="'.$id.'"';
    if ($row != "") {
        print ' rows="'.$row.'"';
    }
    if ($placeholder != "") {
        print ' placeholder="'.$placeholder.'"';
    }
    print ">";
    if ($description != "") {
        print  $description;
    }
    if ($type != "") {
        print "</$type_balise>";
    }
    print "</div>\n</div>";
}

function ajout_option($array_option, $result, $row_assoc)
{
    if (func_get_arg('3') != null) {
        while ($row = db_fetch($result)) {
            print '<option value="'.$row[func_get_arg('3')].'">'.$row[$row_assoc].' - '.$row[func_get_arg('3')]."</option>";
        }
    } elseif ($row_assoc != null) {
        while ($row = db_fetch($result)) {
            print '<option value="'.$row[$row_assoc].'">'.$row[$row_assoc]."</option>";
        }
    } else {
        $n = count($array_option);
        for ($i = 0; $i < $n; $i++) {
            echo '<option value="'.$array_option[$i].'">'. $array_option[$i]."</option>";
        }
    }
}

function affiche($str)
{
    echo $str;
}


function affiche_info($str)
{
    echo '<p>'.$str.'</p>';
}

function affiche_erreur($str)
{
    echo '<p class="erreur">'.$str.'</p>';
}



function ajout_champ()
{
/* fonction qui prend comme arguments dans l'ordre: type, value, name, label, id, (required), (step)
    (les arguments entre parenthèses ne sont pas obligatoires, mais doivent être à l'index prévu:
    par exemple, si on veut indiquer un argument step, il faut mettre un argument required)
*/

    $tmp = '';
    //label
    if (! empty(func_get_arg(3))) {
        $tmp .= '<label for="'.func_get_arg(4) .'">'.func_get_arg(3).':</label>';
    }
    $tmp .= '<input type="'.func_get_arg(0).'" ';
    if (! empty(func_get_arg(4))) {
        $tmp .= 'id="'.func_get_arg(4).'" ';
    }
    if (! empty(func_get_arg(1))) {
        $tmp .= 'value="'.func_get_arg(1).'" ';
    }
    if (! empty(func_get_arg(2))) {
        $tmp .= 'name="'.func_get_arg(2).'" ';
    }
    if (func_num_args() > 5 && func_get_arg(5)) {
        $tmp .= 'required="required" ';
    }
    if (func_num_args() > 6 && func_get_arg(0) == "number" && func_get_arg(6) == -1) {
        $tmp .= 'step="any" ';
    }

    $tmp .= '>';
    return $tmp;
}


function afficheDemande($result)
{
    echo "<h1>list de demande</h1>";
    echo "<table class='table table-bordered table-hover table-striped'>";
    while ($row = pg_fetch_array($result)) {
        echo "<tr>";
        echo "<td>id: {$row['d_client']}</td>";
        echo "<td>texte: {$row['texte']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}


function tab()
{
    echo ' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp';
}

function tanchukuang($id_modal,$id_modal_label,$lesMots)
{
    echo '
    <div class="modal fade" id='.$id_modal.' tabindex="-1" role="dialog" aria-labelledby='.$id_modal_label.'  style="position:absolute;height:200;width:200;overflow:auto" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id='.$id_modal_label.'>
				    '.$lesMots.'
				</h4>
			</div>
			<div class="modal-body">
						 
           
'
			;
}

function tanchukuang_pied()
{

    echo'	</div>
			<div class="modal-footer">

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>';
}
