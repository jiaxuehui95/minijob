<!DOCTYPE html>
<html>
<head>
    <title>MiniJobs - pagePersonnel</title>
    <html lang="fr">
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
.w3-red1,.w3-hover-red1:hover{color:#fff!important;background-color:#f66257!important}
</style>
<body>

<!-- Navbar -->
<?php
include_once("Vue.php");
include_once("Modele.php");
session_start();
verif_authent();
require("html/nav_final.php");
 ?>

<div class="w3-content w3-margin-top w3-padding-64" style="max-width:1400px;">
<?php include_once("Vue.php");
    include_once ("Modele.php");
    include_once ("html/list_demande_pagePerso.php");
    include_once ("html/list_commande_perso.php");
    include_once ("html/list_changes.php");
    	session_start();
        	if(isset($_SESSION['id_client'])){
    	    $id_client=  $_SESSION['id_client'];
        	}
        	else
        	{echo "error00";}
    
   
     addimage($id_client);
     a($id_client);
    pg_query("set names utf8"); 
     $conn = db_connect();
    $sql="select * from client where id_client=$id_client";  
    $result=pg_query($conn,$sql);  
    $row=pg_fetch_array($result);
   
    
?>

    <!-- The Grid -->
    <div class="w3-row-padding">

        <!-- Left Column -->
        <div class="w3-third">

            <div class="w3-white w3-text-grey w3-card-4">
                <div class="w3-display-container w3-center">
                    <!-- avatar -->
                    
                    <?php
                    if($row['image']=='')
                        echo "<div><br><img class='w3-circle ' src='img/photo.png'  style='width:40%' alt='Avatar'></div>";
                    else {
                        echo "<div><br><img class='w3-circle ' src=".$row['image']. "  style='width:40%' alt='Avatar'></div>";
                    }
                    ?>
                    <div class="w3-display-bottom w3-left w3-container w3-text-black">
                        <!-- nom client -->
                        
                        <h2 class="w3-text-grey w3-left"><?php echo $row['username'];?></h2>  
                        <button class=" w3-button w3-padding-small w3-margin-top"  width="30" heigh="15" onclick="openCity(event,'changer')"><img src="img/modifier.png" width="13" heigh="13" margin="0px"><p><font size="1" face="Verdana">modifier</font></p></button>
               
                    </div>
                </div>
                <div class="w3-container w3-padding">
                    <!-- information du client -->
                    
                    <p><i class="fa fa-flag fa-fw w3-margin-right w3-large w3-text-red"></i><?php echo $row['nom'].' '.$row['prenom'];?></p>
                    <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-red"></i><?php echo " niveau: ".$row['niveau'];?></p>
                    <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-red"></i><?php echo $row['adresse'].', '.$row['ville'].", ".$row['pays'];?></p>
                    <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-red"></i><?php echo $row['email'];?></p>
                    <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-red"></i><?php echo $row['telephone'];?></p>
                      <?php //echo' <button class="w3-tag w3-red w3-round" data-toggle="modal" data-target="#myquali">voir votre qualification</button>';
                        echo '<button class="w3-btn w3-block w3-red " data-toggle="modal" data-target="#myquali">voir votre qualification</button>';
                            echo " <hr> ";
                             tanchukuang(myquali,myqualiLabel,"votre qualification");
                                appli2($row['id_client']);
                             tanchukuang_pied();
                           ?>  
                    <hr>

                    <p class="w3-large"><b><i class="fa fa-asterisk fa-fw w3-margin-right w3-text-red"></i>Description</b></p>
                    <p><?php echo $row['desciption'];?></p>
                    <br>

                   
                </div>
            </div><br>

            <!-- End Left Column -->
        </div>

        <!-- Right Column -->
        <div class="w3-twothird">
            
            <div class="w3-bar w3-red">
                    <button class="w3-bar-item w3-button testbtn w3-padding-16 w3-theme-dark" onclick="openCity(event,'Offre')">Vos Offres</button>
                    <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'Demande')">Vos Commandes</button>
                    <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'Acception')">Vos Acceptions</button>
                    <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'changer')">Vos Modification</button>
                    <button class="w3-bar-item w3-button testbtn w3-padding-16" onclick="openCity(event,'recharger')"><i class="fa fa-credit-card" style="font-size:16px"></i></button>
                </div>

            <div class="w3-container w3-card-2 w3-white w3-margin-bottom w3-border">

                <div id="Offre" class="w3-container city w3-animate-opacity" style="display: block;">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-red"></i>Vos Offres</h2>
                    <div class="w3-container">
                       <?php 
                        showDemande($id_client);
                       ?>
                        </div>
                      </div>

                <div id="Demande" class="w3-container city w3-animate-opacity" style="display: none;">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-red"></i>List de Commande validé </h2>
                    <div class="w3-container">
                       <?php 
                        showCommande($id_client);
                    ?>
                         <hr>
                    </div>

                </div>
                    
                    <div id="Acception" class="w3-container city w3-animate-opacity" style="display: none;">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-red"></i>List de Vos Acceptions</h2>
                    <div class="w3-container">
                       <?php 
                        showAcception($id_client);
                    ?>
                </div>
                </div>
                    <div id="changer" class="w3-container city w3-animate-opacity" style="display: none;">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-red"></i>List de Vos modification</h2>
                    <div class="w3-row">
                    <div class="w3-twothird w3-container">
                        <?php 
                        changer_information($id_client);
                        ?>
                    </div>
                    <div class="w3-third w3-container">
                        <?php
                        showimage($id_client);
                        ?>
                    </div>
                    </div>
                </div>
                 <div id="recharger" class="w3-container city w3-animate-opacity" style="display: none;">
                    <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-red"></i>Recharger (Coming Soon)</h2>
                   
                </div>
                 </div>

            <!-- End Right Column -->
        </div>

        <!-- End Grid -->
    </div>

<!-- End Page Container -->
</div>

<!-- Footer -->
<?php
require("html/footer.php");
?>

</body>
</html>