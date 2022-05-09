<?php
    include "../../app/database/db.php";

$indexNews=[];    
$indexResult=[];
$allPublishedNews=[];
$allPublishedResults=[];
$newsPublished = getArrayofIdPublishedPosts('news');
$resultsPublished = getArrayofIdPublishedPosts('results');

foreach ($newsPublished as $key => $value) {
    $item = selectOne('news', ['id' => $value]);
    array_push($indexNews, $item);
    array_push($allPublishedNews, $item);
}

foreach ($resultsPublished as $key => $value) {
    $item = selectOne('results', ['id' => $value]);
    array_push($allPublishedResults, $item);
}

$indexNews = array_slice($indexNews,0,3);

$indexResult = selectOne('results', ['id' => $resultsPublished[0]]);