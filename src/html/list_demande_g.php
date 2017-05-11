<?php
//	include 'config.php';
   // include 'db.php';
  //  include 'GestionDemande.php';
    //$conn = db_connect();
    include_once 'pageIndex.php';
    include_once 'vue_list.php';
//    include_once 'model_list.php';
     $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
    // //连接pg数据库

    // //设置客户端和连接字符集
    pg_query("set names utf8");


    //limit要求参数
    $length = 5;
    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;

    //数据总行数
    $sqltot = "select count(*) from demande where status=0 ";
    $arrtot = pg_fetch_row(pg_query($sqltot));
    $pagetot = ceil($arrtot[0] / $length);

    //限制页数
if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}
    $offset = ($pagenum - 1) * $length;

    //从数据库获取数据
    $sql = "select * from demande where status=0  ORDER BY start_time DESC limit {$length} offset {$offset};";
    $result = pg_query($sql);


/*    $result = listNewest(); */
    showListDemand($result);
    
    pageIndex($pagenum, 'page');

    pg_close($conn);
