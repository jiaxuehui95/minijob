<?php


function pageIndex($pagenum, $pagenom)
{
    $prevpage = $pagenum - 1;
    $nextpage = $pagenum + 1;
    echo '<div class="w3-center w3-padding-32">';
    echo '<div class="w3-bar">';
    echo '
            <a href="mainPage2.php?'.$pagenom.'='.$prevpage.'#demande" class="w3-bar-item w3-button w3-hover-theme">«</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-theme">Page '.$pagenum.'</a>
            <a href="mainPage2.php?'.$pagenom.'='.$nextpage.'#demande" class="w3-bar-item w3-button w3-hover-theme">»</a>
             </div>';
    echo '</div>';
}


function pageIndexT($pagenum, $pagenom)
{
    $prevpage = $pagenum - 1;
    $nextpage = $pagenum + 1;
    echo '<div class="w3-center w3-padding-32">';
    echo '<div class="w3-bar">';
    echo '
            <a href="mainPage2.php?'.$pagenom.'='.$prevpage.'#type" class="w3-bar-item w3-button w3-hover-theme">«</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-theme">Page '.$pagenum.'</a>
            <a href="mainPage2.php?'.$pagenom.'='.$nextpage.'#type" class="w3-bar-item w3-button w3-hover-theme">»</a>
             </div>';
    echo '</div>';
}


function pageIndexF($pagenum, $pagenom)
{
    $prevpage = $pagenum - 1;
    $nextpage = $pagenum + 1;
    echo '<div class="w3-center w3-padding-32">';
    echo '<div class="w3-bar">';
    echo '
            <a href="mainPage2.php?'.$pagenom.'='.$prevpage.'#Fdemande" class="w3-bar-item w3-button w3-hover-theme">«</a>
            <a href="#" class="w3-bar-item w3-button w3-hover-theme">Page '.$pagenum.'</a>
            <a href="mainPage2.php?'.$pagenom.'='.$nextpage.'#Fdemande" class="w3-bar-item w3-button w3-hover-theme">»</a>
             </div>';
    echo '</div>';
}