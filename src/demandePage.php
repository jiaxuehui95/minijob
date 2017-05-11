<!DOCTYPE html>
<html>
<head>
    <title>MiniJobs - Demande</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel ="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/nav.js"></script>
</head>
<style>
body,/*h1,*/h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,/*h1,*/button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.w3-dark,.w3-hover-dark:hover{color:#fff!important;background-color:#333333!important;}
.w3-background-image{background-image:url("img/background-image.jpg")!important;background-size:cover;}
.w3-red,.w3-hover-red:hover{background-color:#63afcf!important;}
</style>
<body>

<!-- Navbar -->
<?php
include_once("Vue.php");
include_once("Modele.php");
session_start();
$id_client=verif_authent();
require("html/nav_final.php");

?>

<!-- Header -->
<header class="w3-container w3-background-image w3-center" style="padding:128px 16px" id="myHeader">
  <h1 class="w3-margin w3-jumbo">MiniJobs</h1>
  <p class="w3-xlarge">Faites votre demande!</p>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">ici</button>
</header>


<!-- Formulaire de demande -->
<div class="w3-padding-64 w3-container"  id="demandeFor">
    
  <div class="w3-card white">
    
    <!-- Titre du formulaire -->
    <div class="w3-container w3-red">
      <h2>Demande</h2>
    </div>
    
    <form class="form-horizontal w3-padding-64 container" method="post" action="GestionDemande.php"> <!-- method="post" action="demandePage.php" envoyer vers une nouvelle page les infos -->
      
      <!-- titre -->
      <div class="form-group">
        <label class="control-label col-sm-2 w3-text-grey" for="sujet">Titre:</label>
        <div class="col-sm-10">
          <input type="textarea" class="form-control w3-input" id="sujet" name="sujet" placeholder="Exemple: Retirer un colis (H/F)">
        </div>
      </div>
      
      <!-- Selection multiple : catégorie -->
      <div class="form-group">
        <label class="control-label col-sm-2 w3-text-grey" for="sel1">Catégorie:</label>
        <div class="col-sm-10">
          <select class="form-control" id="sel1" name="categorie">
            <?php
            ajout_option(['soutien','informatique','jeu','sport','voyage','autre'], null, null);
            ?>
          </select>
        </div>
      </div>
      
      <!-- Selection simple : lieu -->
      <div class="form-group">
        <label class="control-label col-sm-2 w3-text-grey" for="lieu">Code postale :</label>
        <div class="col-sm-10">
          <?php
    	    $id_client= $_SESSION['id_client'];
          $row=getClient($id_client);
          echo "<input class=\"form-control w3-input\" type=\"text\" name=\"lieu\" value=\"".$row['postal']."\">";
          ?>
        </div>
    </div>
    
      <!-- textarea : description -->
      <div class="form-group">
        <label class="control-label col-sm-2 w3-text-grey" style="resize:none" for="description">Description:</label>
        <div class="col-sm-10">
            <textarea class="form-control w3-input" rows="5" id="description" name="description" placeholder="Décrivez votre offre !"></textarea>
        </div>
      </div>
    
      <!-- textarea : date -->
      
      <!-- problème format date type text?-->
      <div class="form-group">
        <label class="control-label col-sm-2 w3-text-grey" for="date">Deadline:</label>
        <div class="col-sm-10">
            <input type="date" class="form-control w3-date" id="deadline" name="deadline">
        </div>
      </div>    
    
      <!-- bouton : submit -->
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10 w3-text-grey">
          <button type="submit" class="btn btn-default">Submit</button>
        </div>
      </div>
    
  </form>

  </div>
</div>


<!-- Footer -->
<?php
require("html/footer.php");
?>

</body>
</html>