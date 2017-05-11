<?php
//	include 'config.php';
   // include 'db.php';
  //  include 'GestionDemande.php';
    //$conn = db_connect();
    include_once 'pageIndex.php';
    include_once 'vue_list.php';


       
        
  
        $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
        
           pg_query("set names utf8");
        

 
           $length = 5;
           $pagenum = @$_GET['Fpage'] ? $_GET['Fpage'] : 1;


           $sqltot = "select count(*) from demande where status=0";
          $arrtot = pg_fetch_row(pg_query($sqltot));
          $pagetot = ceil($arrtot[0] / $length);


        if ($pagenum >= $pagetot) {
           $pagenum = $pagetot;
        }
         $offset = ($pagenum - 1) * $length;
        

           $sql = "select * from demande where status=0 AND id_demande NOT IN (SELECT id_demande FROM application) ORDER BY start_time DESC limit {$length} offset {$offset};";
            $result = pg_query($sql);


        
          showListDemand($result);
    
          pageIndex($pagenum, 'Fpage');

           pg_close($conn);
    
