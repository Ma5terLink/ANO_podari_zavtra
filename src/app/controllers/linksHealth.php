<?php
    include "../../app/database/db.php";

$linksARR = selectAll('links_health');
$therapysARR = selectAll('therapys');

$errMsg=[];
$re=[];
$title="";
$content="";
$therapys="";
$linksEditARR=[];










if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['links-saveBtn'])){

    $tempSTR='';

    $title = trim($_POST['links-title']);
    $content = trim($_POST['links-content']);

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'links-item-') === false) {}
        else{
            $tempSTR = substr($key, 11);
            $therapys = $therapys . $tempSTR.",";
        }
    }
    $therapys = substr($therapys, 0, strlen($therapys)-1);;

    if($title === ''){
        array_push($errMsg, "Заполните название 'кнопки здоровья'!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название кнопки не может быть короче 7 символов!");
    }
    if (empty($errMsg))  {
        $links = [
            'title' => $title,
            'content' => $content,
            'id_therapys' => $therapys
        ];
        $id = insert('links_health', $links);
        $news = selectOne('links_health', ['id' => $id]);
        header('location: '.BASE_URL."admin/linksHealth/index.php");
    }

}












if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    
    $id=$_GET['id'];
    $lh = selectOne('links_health', ['id' => $id]);
    $tempTherapysARR = explode(",", $lh['id_therapys']);

    foreach ($tempTherapysARR as $key => $link) {
        $pageTitle = selectOne('therapys', ['id' => $link])['title'];
        $pageLink = selectOne('therapys', ['id' => $link])['id'];
        array_push($re, ['id' => $pageLink, 'title' => $pageTitle]);    
    }
    // tt($re);
    $title = $lh['title'];
    $content = $lh['content'];
    $therapysARR = selectAll('therapys');
}










if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['links-editBtn'])){

    $tempSTR='';
    $title = trim($_POST['links-title']);
    $content = trim($_POST['links-content']);

    foreach ($_POST as $key => $value) {
        if (strpos($key, 'links-item-') === false) {}
        else{
            $tempSTR = substr($key, 11);
            $therapys = $therapys . $tempSTR.",";
        }
    }
    $therapys = substr($therapys, 0, strlen($therapys)-1);;

    if (empty($errMsg))  {
        $links = [
            'id' => $_POST['id'],
            'title' => $title,
            'content' => $content,
            'id_therapys' => $therapys
        ];
        $id = update('links_health', $links);
        header('location: '.BASE_URL."admin/linksHealth/index.php");
    }

}














// Удаление кнопки
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('links_health', ['id' => $id], true);
    header('location: '.BASE_URL."admin/linksHealth/index.php");
}
