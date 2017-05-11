<?php
//	include 'config.php';
   // include 'db.php';
  //  include 'GestionDemande.php';
    //$conn = db_connect();
    include_once 'pageIndex.php';
    include_once 'vue_list.php';
    session_start();
    if(isset($_SESSION['search'])){
     
         if( isset($_SESSION['start'])&&isset($_SESSION['end']) ){
                 $descri_demande=$_SESSION['search'];
                 $descri_demande_low = strtolower($descri_demande);
                 $descri_demande_up = strtoupper($descri_demande);
                 $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
                 pg_query("set names utf8");
                 $length = 5;
                 $pagenum = @$_GET['Fpage'] ? $_GET['Fpage'] : 1;
                 $offset = ($pagenum - 1) * $length;
                
                 $sqltot = "select count(*) from demande where (texte LIKE '%{$descri_demande_low}%' OR texte LIKE '%{$descri_demande_up}%') AND ( start_time between '{$_SESSION['start']}' AND '{$_SESSION['end']}' ) ";
                 $sql = "select * from demande where status=0 AND (texte LIKE '%{$descri_demande_low}%' OR texte LIKE '%{$descri_demande_up}%') AND ( start_time between '{$_SESSION['start']}' AND '{$_SESSION['end']}' )  ORDER BY start_time DESC limit {$length} offset {$offset};";
                 $arrtot = pg_fetch_row(pg_query($sqltot));
                 $pagetot = ceil($arrtot[0] / $length);

          
                 if ($pagenum >= $pagetot) {
                   $pagenum = $pagetot;
                 }
                
                 $result = pg_query($sql);
                 $row = pg_num_rows($result);

                 showListDemand($result);
                 pageIndexF($pagenum, 'Fpage');
                 pg_close($conn);
           
        }else{
                
                 $descri_demande=$_SESSION['search'];
                 $descri_demande_low = strtolower($descri_demande);
                 $descri_demande_up = strtoupper($descri_demande);
        
                 $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
         
                pg_query("set names utf8");
                $length = 5;
                $pagenum = @$_GET['Fpage'] ? $_GET['Fpage'] : 1;
                $sqltot = "select count(*) from demande where texte LIKE '%{$descri_demande_low}%' OR texte LIKE '%{$descri_demande_up}%' ;  ";
                $arrtot = pg_fetch_row(pg_query($sqltot));
                $pagetot = ceil($arrtot[0] / $length);
                
                if ($pagenum >= $pagetot) {
                    $pagenum = $pagetot;
                }
                
                $offset = ($pagenum - 1) * $length;
                $sql = "select * from demande where status=0 AND texte LIKE '%{$descri_demande_low}%' OR texte LIKE '%{$descri_demande_up}%'  ORDER BY start_time DESC limit {$length} offset {$offset};";     
                $result = pg_query($sql);
                $row = pg_num_rows($result);
                showListDemand($result);
                pageIndexF($pagenum, 'Fpage');
                pg_close($conn);
        }
        
    }else{
        $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
        pg_query("set names utf8");
        $length = 5;
        $pagenum = @$_GET['Fpage'] ? $_GET['Fpage'] : 1;
        $sqltot = "select count(*) from demande";
        $arrtot = pg_fetch_row(pg_query($sqltot));
        $pagetot = ceil($arrtot[0] / $length);
        if ($pagenum >= $pagetot) {
           $pagenum = $pagetot;
        }
        $offset = ($pagenum - 1) * $length;
        $sql = "select * from demande where status=0  ORDER BY start_time DESC limit {$length} offset {$offset};";
        $result = pg_query($sql);
        showListDemand($result);
        pageIndexF($pagenum, 'Fpage');
        pg_close($conn);
    }
