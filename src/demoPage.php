<?php

    $conn = pg_connect("host=localhost dbname=tp_web user=tp_web password=tp_web");
if ($conn) {
    echo "connected !";
} else {
    echo "fail connected";
}
    // //连接pg数据库
    // $conn=pg_connect("localhost","","");


    //设置客户端和连接字符集
    pg_query("set names utf8");

    //limit要求参数
    $length = 5;
    $pagenum = @$_GET['page'] ? $_GET['page'] : 1;

    //数据总行数
    $sqltot = "select count(*) from demande";
    $arrtot = pg_fetch_row(pg_query($sqltot));
    $pagetot = ceil($arrtot[0] / $length);

    //限制页数
if ($pagenum >= $pagetot) {
    $pagenum = $pagetot;
}
    $offset = ($pagenum - 1) * $length;

    //从数据库获取数据
    $sql = "select * from demande limit {$length} offset {$offset} ";
    $result = pg_query($sql);
    echo "<h1>用户信息表</h1>";
    echo "<table class='table table-bordered table-hover table-striped'>";
      echo "<th>";
        echo "<td>Type</td>";
        echo "<td>Description</td>";
        echo "<td>Start</td>";
        echo "<td>End</td>";
        echo "</th>";
while ($row = pg_fetch_array($result)) {
    echo "<tr>";
    echo "<td>{$row['q_type']}</td>";
    echo "<td>{$row['texte']}</td>";
    echo "<td>{$row['start_time']}</td>";
    echo "<td>{$row['deadline']}</td>";
    echo "</tr>";
}
    echo "</table>";

    //计算上一页和下一页
    $prevpage = $pagenum - 1;
    $nextpage = $pagenum + 1;

    echo "<h2><a href='demoPage.php?page={$prevpage}'>上一页</a><a href='demoPage.php?page={$nextpage}'>下一页</a></h2>";

    //释放连接资源
    pg_close($conn);

include_once("db.php");

$postal='91000';

$db = db_connect();
    $query = "select ville_nom from ville where code_postal='{$postal}';";
    $result = db_query($db, $query);
    
    echo $query;
    echo $result['ville_nom'];
    db_close($db);
    if($row = db_fetch($result))
    {
        return $result['ville_nom'];
    }
    else{
        return false;
    }
