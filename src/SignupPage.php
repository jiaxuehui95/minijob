<!DOCTYPE html>
<html>
<head>
    <title>MiniJobs</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
    <link rel ="stylesheet" href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/nav.js"></script>
    
    <link href="css/button.css" rel="stylesheet">
    <link href="css/search_box.css" rel="stylesheet">
    <link href="css/li_hover.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

</head>
<style>
body,/*h1,*/h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,/*h1,*/button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.w3-dark,.w3-hover-dark:hover{color:#fff!important;background-color:#333333!important;}

</style>
<body>

<!-- Navbar -->
<?php
require("html/nav_final.php");
?>

<div class="w3-row-padding w3-padding-64 w3-container">
  
  <div class="w3-card white">
    
  <div class="w3-container w3-theme">
      <h2>Input Form</h2>
  </div>
  
  <form name="contact_form" method="post" action="add.php" class="form-horizontal w3-container w3-padding-64">
    
    <!-- username -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">* Nom d'utilisateur</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="username" type="text" required="">
            </div>
        </div>

        <!-- nom -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">* Nom</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="nom" type="text" required="">
            </div>
        </div>

        <!-- Prenom -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">* Prénom</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="prenom" type="text" required="">
            </div>
        </div>

        <!-- password -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">* Mot de Passe</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="password" type="password" required="">
            </div>
        </div>

        <!-- confirmer password -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">* Confirmer votre Mot de Passe</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="confirmPassword" type="password" required="">
            </div>
        </div>

        <!--telephone -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Téléphone</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="telephone" type="text">
            </div>
        </div>

        <!-- naissance -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Date de Naissance</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="naissance" type="date">
            </div>
        </div>

        <!-- email -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">* Email</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="email" type="email" placeholder="name@something.com" required="">
            </div>
        </div>

        <!-- Adresse -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Adresse</label>
            <div class="col-sm-10">
                <input class="ad w3-input w3-border w3-light-grey" name="adresse" id="adresse" type="text">
            </div>
        </div>

        <!-- code postal -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Code Postal</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="postal" type="text">
            </div>
        </div>

        <!-- ville -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Ville</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="ville" type="text">
            </div>
        </div>

        <!-- Pays -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Pays</label>
            <div class="col-sm-10">
                <input class="w3-input w3-border w3-light-grey" name="pays" type="text">
            </div>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label class="control-label col-sm-2 w3-text-grey">Description</label>
            <div class="col-sm-10">
                <textarea class="w3-input w3-border w3-light-grey" rows="8" name="pays" placeholder="Décrivez vous ..."></textarea>
            </div>
        </div>

        <!-- bouton : submit -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 w3-text-red">
                <button type="submit" class="w3-button w3-red w3-right" name="SignUp" value="SignUp">S'inscrire</button>
            </div>
        </div>
      
    </form> 

  </div>
</div>

</body>
</html>