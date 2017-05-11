<!DOCTYPE html>
<html>
<head>
    <title>MiniJobs</title>
    <html lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    
    <link rel="stylesheet" href="css/w3.css">
    <link href="css/button.css" rel="stylesheet">
    <link href="css/search_box.css" rel="stylesheet">
    <link href="css/li_hover.css" rel="stylesheet">

</head>
<style>
body,/*h1,*/h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,/*h1,*/button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
.w3-dark,.w3-hover-dark:hover{color:#fff!important;background-color:#333333!important;}
.w3-background-image{background-image:url("img/bgred.png")!important;background-size:cover;}
/*.w3-red,.w3-hover-red:hover{background-color:#63afcf!important;}*/
input[name=search] {
    width: 50% !important;
    box-sizing: border-box !important;
    border: 2px solid #ccc !important;
    border-radius: 4px !important;
    font-size: 16px !important;
    background-color: white;
    background-image: url('img/search.png');
    background-size: 30px 30px;
    background-position: 5px 10px; 
    background-repeat: no-repeat !important;
    padding: 12px 20px 12px 40px;}
li{
    border-bottom-style:dashed !important;
    border-color:red;
}
li:last-child{
    border-bottom:none !important;
}
</style>
<body>
    
 
<!-- Navbar -->
<?php
require("html/nav_final.php");
?>

<!-- Header -->
<header class="w3-container w3-background-image w3-center" style="padding:128px 16px" id="myHeader">
  <h1 class="w3-margin w3-jumbo">MiniJobs</h1>
  <p class="w3-xlarge">Ne gâchez pas votre temps libre!</p>
    <?php
    if (! isset($_SESSION['username'])) {
        echo '<button class="w3-btn w3-xlarge w3-white w3-opacity w3-hover-red" onclick="document.getElementById(\'id01\').style.display=\'block\'" style="font-weight:900;">Commencez 
        
        !</button>';
      
            
    } else {
          
        echo '<a href="#demandeliste" class="w3-btn w3-opacity w3-xlarge w3-white w3-hover-red"  style="font-weight:900;">Bonjour!</a>';
    }

    ?>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
     <div class="w3-content">
     <div class="w3-twothird">
      <h1>Bienvenu!</h1>
      <h2 class="w3-padding-32">Le temps c'est de l'argent, alors pourquoi ne pas mettre votre temps à profit pour vous enrichir!</h2>

      <h2 class="w3-text-grey">Sur notre site, vous pouvez poster et trouver des missions en tout genre de durée plus ou moins courtes mais tout est au rendez-vous pour vous satisfaire. Il ne manque plus qu'à vous de choisir votre bonheur.</h2>
     </div>

    <div class="w3-third w3-center">
        <img class="fa w3-padding-64" src="img/time.png" alt="time"/>
    </div>
    
  </div>
</div>
<a name="Fdemande"></a>
<!-- rechercher -->
<!-- TODO problème de style -->
<div class="w3-padding-row w3-padding-64">
    
<div class="w3-center w3-row-padding" id="demandeliste" >
    <div class="w3-third">
        <div class="w3-container w3-grey">
            <h3 class="w3-margin w3-xlarge w3-text-white">Rechercher</h3>
            
        <div class="w3-padding-64">
            
        <form action="searchDemande.php" method="post">
            <div class="form-group">
            <input type="text" class ="w3-input w3-animate-input w3-border" name="search" style="width:30%" placeholder="Chercher une offre..." autocomplete="off" required="required"/>
            </div>
            <div class="form-group">
            <label>Du</label>
            <input type="date" class="form-control w3-date" id="start" name="start">
            </div>
            <div class="form-group">
            <label>Au</label>
            <input type="date" class="form-control w3-date" id="end" name="end">
            </div>
            <div class="form-group">
            <button type="submit" class="w3-button w3-red w3-hover-white w3-left-align"><i class="fa fa-search w3-margin-right"></i>Valider</button>
            </div>  
            </form>
        </div>
        </div>
        
    </div>

    <div class="w3-twothird">
        <div class="w3-card white">
            <div class="w3-container w3-red">
                <h3> Resultat </h3>
                
            </div>
            <div>
           <?php
            require("html/list_demande_s.php");
            ?>
            </div>
        
        </div>
    </div>


            
</div>


<!-- liste des demandes -->

<!-- TODO remplacer par la liste des demandes correspondantes-->

<div class="w3-row-padding" id="demandeliste" >
    <a name="demande"></a>
    <div class="w3-half">
        <div class="w3-card white">
        <div class="w3-container w3-red">
            <h3> Offres les plus récentes </h3>
             <a name="demande"></a>
        </div>
        <div>
        <?php
        require("html/list_demande_g.php");
        ?>
        </div>
    </div>

    <div class="w3-half">
        <div class="w3-card white">
            <div class="w3-container w3-red">
                <h3> Soyez le premier à postuler </h3>
            </div>
            <div>
            <?php
            require("html/list_demande_d.php");
            ?>
            </div>
        <a name="type"></a>
        </div>
    </div>

  


<!-- Tab -->

<div class="w3-row-padding w3-padding-64">
    <div class="w3-card white">
    <div class="w3-container w3-red">
        <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-red" onclick="openCity(event,'jeu')">Jeux</button>
        <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-red" onclick="openCity(event,'sport')">Sport</button>
        <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-red" onclick="openCity(event,'voyage')">Voyage</button>
         <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-red" onclick="openCity(event,'soutien')">Soutien</button>
          <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-red" onclick="openCity(event,'informatique')">Informatique</button>
          <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-red" onclick="openCity(event,'autre')">Autre</button>
        <div class="w3-dropdown-hover">
            <button class="w3-button w3-padding-16">
                Dropdown <i class="fa fa-caret-down"></i>
                
            </button>
               <a name="Tdemande"></a>
            <div class="w3-dropdown-content w3-card-4 w3-bar-block">
                <a class="w3-bar-item w3-button" onclick="openCity(event,'sport')">Sport</a>
                <a class="w3-bar-item w3-button" onclick="openCity(event,'jeu')">Jeux</a>
                <a class="w3-bar-item w3-button" onclick="openCity(event,'Quotidienne')">Quotidienne</a>
            </div>
        </div>
    </div>
    <div id="jeu" class="w3-container city w3-animate-opacity" style="display: block;">
     
        <?php
          include_once 'html/list_demande_type.php';
        Tdemande('jeu');
        ?>
    </div>

    <div id="sport" class="w3-container city w3-animate-opacity" style="display: none;">
        <?php

        include_once 'html/list_demande_type.php';
        Tdemande('sport');
        ?>
    </div>

    <div id="voyage" class="w3-container city w3-animate-opacity" style="display: none;">
         <?php

        include_once 'html/list_demande_type.php';
        Tdemande('voyage');
        ?> 
    </div>
    <div id="soutien" class="w3-container city w3-animate-opacity" style="display: none;">
         <?php

        include_once 'html/list_demande_type.php';
        Tdemande('soutien');
        ?> 
    </div>
    <div id="informatique" class="w3-container city w3-animate-opacity" style="display: none;">
         <?php

        include_once 'html/list_demande_type.php';
        Tdemande('informatique');
        ?> 
    </div>
     <div id="autre" class="w3-container city w3-animate-opacity" style="display: none;">
         <?php

        include_once 'html/list_demande_type.php';
        Tdemande('autre');
        ?> 
    </div>
    </div>
</div>


<!-- Footer -->
<?php
require("html/footer.php");
?>

<!--网页效果JS引入-->
<script type="text/javascript" src="../js/liHover.js"></script>
</body>
</html>