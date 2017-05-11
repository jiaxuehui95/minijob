<!DOCTYPE html>
<html>
<head>
    <title>MiniJobs - Demande</title>
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
    
    <link href="css/button.css" rel="stylesheet">
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
include_once("Vue.php");
include_once("db.php");
?>

<!-- Page de Demande -->
<div class="w3-row-padding w3-padding-64 w3-container">
    

<?php
session_start();

include_once("model_demande.php");

$id_demande = $_GET['id_demande'];
$id_client = $_SESSION['id_client'];
$result= getDemand($id_demande);
if ($row = db_fetch($result)) {
    pg_query("set names utf8"); 
    $conn1 = db_connect();
    $sql1="select * from client where id_client=".$row['d_client'].";";  
    $result1=pg_query($conn1,$sql1);  
    $row1=pg_fetch_array($result1);
 
  if($row1['image']=='')
    echo "<div><br><img class='w3-circle w3-animate-top' src='img/photo.png'  style='width:200px' alt='Avatar'></div>";
  else {
    echo "<div><br><img class='w3-circle w3-animate-top' src=".$row1['image']. "  style='width:200px' alt='Avatar'></div>";
  }
  if($row['title']!='')
    echo "<h2 class=\"w3-opacity\">Sujet: {$row['title']}</h2>";
  else
    echo "<h2 class=\"w3-opacity\">Sujet: Sans Titre</h2>";
  echo '<h4 class="w3-text-red"><i class="fa fa-calendar fa-fw w3-margin-right"></i>'.$row['start_time'].'-- <span class="w3-tag w3-red w3-round">'.$row['deadline'].'</span></h4>';
  if ($row['place']!=null)
    {
        echo "<h4><i class=\"fa fa-map-marker fa-fw w3-margin-right\"></i>{$row['place']}</h4>";
    }
    echo "<h5>Catégorie  : {$row['q_type']}</h5>";
    echo "<hr>";
    echo "<p>Ref.{$row['id_demande']}</p><br/>";
    echo "<p>texte: {$row['texte']}</p>";
}
if (isset($_POST['Postuler'])) {
    $id_demande = $_GET['id_demande'];
    $text = $_POST['text'];
    $flag = postApplication($id_client,$id_demande,$text);
    if(!flag)
    {
        echo "ERROR post";
    }
    else
    {
      echo "Succès";
    }
}
?>

<!-- Formulaire de demande -->
<div class="w3-card white">
  
  <!-- Formulaire de post -->
  <div class="w3-container w3-red\">
    <h2>Demande</h2>
  </div>
    
    <?php echo "<form class=\"form-horizontal w3-padding-64 container\" name=\"app_form\" method=\"post\" action=\"demande.php?id_demande={$id_demande}\">"; ?>

      <div class="form-group">
        <label class="control-label col-sm-2 w3-text-red" style="resize:none" for="text">Message:</label>
        <div class="col-sm-10">
          <textarea class="form-control w3-input" name="text" cols ="60" rows ="8" placeholder="Laissez votre message !" required></textarea>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-10 w3-text-red">
          <input class="button button-3d button-caution" name="Postuler" type="submit" value="Postuler"/>
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
