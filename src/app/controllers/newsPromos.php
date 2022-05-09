<?php
    include "../../path.php";
    include "../../database/db.php";
    include "app/controllers/getPublishedARR.php";

$numsPostOnPage = 5; // Кол-во отображаемых записей на странице



if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['page'])) {
    $_SESSION['news_page'] = $_GET['page'];
}

if($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(empty($_SESSION['news_page'])) {
        $_SESSION['news_page'] = 1;
    }
       
    $numsNews = count($allPublishedNews);
    $numberOfPages = intdiv($numsNews, $numsPostOnPage);          // Находим число страниц (5 записей на странице)
    if ($numsNews%$numsPostOnPage != 0) {                         
        $numberOfPages += 1;
    }
    // Новости на странице
    $numsNewsOnPageFirst = ($_SESSION['news_page'] * $numsPostOnPage) - ($numsPostOnPage-1); // Первая отображаемая
    $numsNewsOnPageSec = $_SESSION['news_page'] * $numsPostOnPage; // Последняя отображаемая
        
    if($numsNewsOnPageSec > $numsNews) {    // Если последняя отображаемая больше чем кол-во самих новостей)), меняем.
        $numsNewsOnPageSec = $numsNews;
    };
    

    

}