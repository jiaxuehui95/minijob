<?php 
include_once("Vue.php");
//	include 'config.php';
//   include 'db.php';
    
                        include_once 'Modele.php';
                        function showDemande($id_client)
                {
                        $conn = db_connect();
                        pg_query("set names utf8");
                        $length=5; 
                        $pagenum=@$_GET['page']?$_GET['page']:1;  
                        $sqltot="select count(*) from demande where d_client=$id_client";  
                        $arrtot=pg_fetch_row(pg_query($sqltot));  
                        $pagetot=ceil($arrtot[0]/$length);  
                        if($pagenum>=$pagetot){  
                            $pagenum=$pagetot;  
                        }  
                        $offset=($pagenum-1)*$length; 
                        $sql="select distinct * from demande where d_client=$id_client order by status limit {$length} offset {$offset} "; 
                        $result=pg_query($sql);
                        $id=1;
                        while($row=pg_fetch_array($result))
                        { 
                            $id=$id+1;
                            $id_demande=$row['id_demande'];
                            $id_dem=$id_demande;
                            echo '<h5 ><b>'.$row['title'].'</b>
                            <h5 class="w3-opacity"><b>type:&nbsp &nbsp'.$row['q_type'].'</b></h5>
                             <h6 class="w3-text-red"><i class="fa fa-calendar fa-fw w3-margin-right"></i>'.$row['start_time'].'--'.$row['deadline'] ;
                              if ($row['status'] == 0)
                           {
                                 echo '&nbsp&nbsp<span class="w3-tag w3-red w3-round">  en cours</span>
                                 <button class="w3-btn  w3-round" onclick="supp('.$id_demande.')">suprrimer</button>
                                 ';
                                  echo'  <script type="text/javascript">
                                 function supp($id_demande)
                                 {
                                     var msg=confirm("vous êtes sûr de supprimer cette demande?");
                                       if (msg == true)
                                  {
                                       document.cookie="flag=1 ;path=/";
                                       document.cookie="id_demande='.$id_demande.'; path=/";
                              
                                       alert("please reload the page");
                                   }
                                    else  document.cookie="flag=0; path=/";
                             }
                                </script>';
                          if (isset($_COOKIE["flag"]))
                           {
                            if($_COOKIE["flag"] == 1)
                            {
                                 supprimerDemangde();
                               
                                 echo '<script> document.cookie="flag=0; path=/";
                                 location.replace("https://ensiie-tp-web-p8-mok0na.c9users.io/persoPage2.php");
                                  location.replace("https://ensiie-tp-web-p8-mok0na.c9users.io/persoPage2.php");
                                   location.replace("https://ensiie-tp-web-p8-mok0na.c9users.io/persoPage2.php");
                                 </script>';
        
                            }
                           }
                          }
                          else
                          {
                            echo '&nbsp&nbsp <span class="w3-tag w3-green w3-round">fini</span>';
                          }
                        echo '</h6><p>'.$row['texte'].'</p>';
                         if ($row['status'] == 0) {
                             
                            echo '<td><button class="w3-btn  w3-red " data-toggle="modal" data-target="#myModal'.$id.'">choisissez un application</button></td></tr>';
                             echo " <hr> ";
                            
                             tanchukuang(myModal.$id,myModalLabel,"les applications");
                               appli($id_demande);
                             tanchukuang_pied();
                        } 
                    }
        
                        $prevpage = $pagenum - 1;
                        $nextpage = $pagenum + 1;

                        echo "<a class='button button-glow button-border button-rounded button-primary' 
                        href='persoPage2.php?page={$prevpage}#demande'>last</a> <a name='page'>  &nbsp  Page: {$pagenum} 
                        &nbsp    </a>  <a class='button button-glow button-border button-rounded button-primary'
                        href='persoPage2.php?page={$nextpage}#demande'>next0</a></br>&nbsp";
                        pg_close($conn);
                }        
                function supprimerDemangde()
                {
                    $id_demande_supp=$_COOKIE['id_demande'];
                     $conn = db_connect();
                        pg_query("set names utf8");
                        $sql="delete from demande where id_demande=".$id_demande_supp;
                        $result=pg_query($sql);
                    
      //   echo "<script type='text/javascript'>document.location.href='persoPage2.php'</script>";
        //                        echo "<script type='text/javascript'>document.location.href='persoPage2.php'</script>";               
                }
                        ?>