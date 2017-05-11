<!DOCTYPE html>
<html>
<head>
<title>commande</title>
<meta content="text/html; charset= utf-8" http-equiv="Content-Type">
</head>
<body>
<?php
    include 'config.php';
    include 'db.php';
    include_once 'Vue.php';
    include_once 'Modele.php';
    $a_client = $_GET["a_client"];
    $id_demande = $_GET["id_demande"];
    $id_client=$_GET["id_client"];
    $conn = db_connect();
  
    pg_query("set names utf8");
    $sql = "INSERT INTO commande2(a_client,id_demande)VALUES(".$a_client.",".$id_demande.");";

     $sql2 = "update demande set status=1 where id_demande=".$id_demande;
     $sql3="update client set niveau=niveau+3 where id_client=$id_client";
     $sql4="update client set niveau=niveau+2 where id_client=$a_client";
    if(!$result2 = pg_query($sql2))
    {
     echo "error ststus";
    }
      if(!$result = pg_query($sql))
      {
       echo "error insert";
      }
      if(!($result3 = pg_query($sql3)))
      {
       echo "error niveau_c";
     echo $id_client."ssss";
       
      }
      if(!($result4 = pg_query($sql4)))
      {
       echo "error niveau_a";
      }
  //echo "success<br><a href=persoPage2.php>retour votre compte</a>";
  echo '<script>
   var msg=confirm("success!niveau +3");
    if (msg == true)
   {
    location.replace("https://ensiie-tp-web-p8-mok0na.c9users.io/persoPage2.php");
    }
    else
    {
      location.replace("https://ensiie-tp-web-p8-mok0na.c9users.io/persoPage2.php");
    }
    </script>';
   
   
   
  
   $sql5="select * from client where id_client=".$a_client;
    $res=db_query($conn,$sql5);
    while($row=db_fetch($res))
    {
     $mailto=$row['email'];
     $mailsubject="success sur:".$id_demande;
     $mailbody="you are success in :".$id_demande;
      $rs = sendMail($mailto, $mailsubject, $mailbody);
      echo $row['email'];
      
    }
    
   

?> 
</<body>
 </html>