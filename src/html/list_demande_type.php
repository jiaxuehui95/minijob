<?php

function Tdemande($type)
{
    include_once 'pageIndex.php';
//	include 'config.php';
   // include 'db.php';
  //  include 'GestionDemande.php';
    //$conn = db_connect();
     $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
    // //连接pg数据库

    // //设置客户端和连接字符集
    pg_query("set names utf8");


    //limit要求参数
    $length = 5;
    $pagenum = @$_GET["{$type}"] ? $_GET["{$type}"] : 1;

    //数据总行数
    $sqltot = "select count(*) from demande where status=0 AND q_type = '{$type}'";
    $arrtot = pg_fetch_row(pg_query($sqltot));
    $pagetot = ceil($arrtot[0] / $length);

    //限制页数
    if ($pagenum >= $pagetot) {
        $pagenum = $pagetot;
    }
    $offset = ($pagenum - 1) * $length;

    //从数据库获取数据
    $sql = "select * from demande where status=0 AND  q_type = '{$type}' limit {$length} offset {$offset} ";
    $result = pg_query($sql);




    showListDemand_type($result);
    
    pageIndexT($pagenum, "{$type}page");


    pg_close($conn);
}
