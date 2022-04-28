<?php
    include "../../app/database/db.php";
    
$errMsg="";
$okMsg="";
$id='';
$title="";
$content="";
$img = "assets/icons/foto-no.svg";

$newsARR = selectAll('news');
$topicsARR = selectAll('topics');

// Создание новой новости\акции
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news-saveBtn'])){

    $title = trim($_POST['news-title']);
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['news-categories'];
    $content = trim($_POST['news-content']);
    $img = $_POST['news-titleImgFile'];
    $published = 0;

    if($title === ''){
        $errMsg = "Заполните название новости\акции!";
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        $errMsg = "Название новости не может быть короче 7 символов!";
    }
    else{
        $news = [
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'published' => $published
        ];
        $id = insert('news', $news);
        $news = selectOne('news', ['id' => $id]);
        $okMsg = "Новость создана и добавлена в БД!";
        header('location: '.BASE_URL."admin/news/index.php");
        }
}

// Редактирование записи - на этапе загрузки edit.php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $news = selectOne('news', ['id' => $id]);
    $id = $news['id'];
    $title = $news['title'];
    $content = $news['content'];
    if (empty($news['img'])) {
        $img = "assets/icons/foto-no.svg";
    }else{
        $img = $news['img'];
    }
    $id_temp = ['id' => $news['id_topic']];
    $name_topic = selectOne('topics', $id_temp);
    $id_topicName = $name_topic['name'];
}

// Редактирование записи - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news-editBtn'])){
    
    $id = $_POST['id'];
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['news-categories'];
    $title = trim($_POST['news-title']);
    $content = trim($_POST['news-content']);
    if ((empty($_POST['news-titleImgFile'])) && (!empty($_POST['fileInDB']))) {
        $img = $_POST['fileInDB'];    
    }else{
        $img = $_POST['news-titleImgFile'];
    }

    if($title === ''){
        $errMsg = "Название новости не должно быть пустым!";
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        $errMsg = "Название новости не может быть короче 7 символов!";
    }else{
        $news = [
            'id' => $id,
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'content' => $content,
            'img' => $img,
        ];
        update('news', $news);
        $okMsg = "Новость в БД обновлена!";
        header('location: '.BASE_URL."admin/news/index.php");
    }
}

// Удаление новости
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('news', ['id' => $id], true);
    header('location: '.BASE_URL."admin/news/index.php");
}

// Публикация новости вкл.\выкл.
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $pid=['id' => $_GET['pub_id']];
    $publish = selectOne('news', $pid);
    $ttt = $publish['published'] === '1' ? '0' : '1';
    $temp_arr = [
            'id' => $publish['id'],
            'published' => $ttt
    ];
    update('news', $temp_arr);
    header('location: '.BASE_URL."admin/news/index.php");
}