<?php
    include "../../path.php";
    include "../../database/db.php";
    include "app/controllers/getPublishedARR.php";

$numsPostOnPage = 5; // Кол-во отображаемых записей на странице



if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['page'])) {
    $_SESSION['results_page'] = $_GET['page'];
}

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(empty($_SESSION['results_page'])) {
        $_SESSION['results_page'] = 1;
    }
       
    $numsResults = count($allPublishedResults);
    $numberOfPages = intdiv($numsResults, $numsPostOnPage);          // Находим число страниц
    if ($numsResults%$numsPostOnPage != 0) {                         
        $numberOfPages += 1;
    }
    // Достижения на странице
    $numsResultsOnPageFirst = ($_SESSION['results_page'] * $numsPostOnPage) - ($numsPostOnPage-1); // Первая отображаемая
    $numsResultsOnPageSec = $_SESSION['results_page'] * $numsPostOnPage; // Последняя отображаемая
        
    if($numsResultsOnPageSec > $numsResults) {    // Если последняя отображаемая больше чем кол-во самих новостей)), меняем.
        $numsResultsOnPageSec = $numsResults;
    };
    

    

}