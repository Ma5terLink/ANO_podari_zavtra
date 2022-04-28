<?php
    include "../../app/database/db.php";
    
$errMsg="";
$okMsg="";
$id='';
$title="";
$content="";
$img = "assets/icons/foto-no.svg";

$resultsARR = selectAll('results');
$topicsARR = selectAll('topics');

// Создание нового достижения
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['results-saveBtn'])){

    $title = trim($_POST['results-title']);
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['results-categories'];
    $content = trim($_POST['results-content']);
    $img = $_POST['results-titleImgFile'];
    $published = 0;

    if($title === ''){
        $errMsg = "Заполните название достижения!";
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        $errMsg = "Название достижения не может быть короче 7 символов!";
    }
    else{
        $results = [
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'content' => $content,
            'img' => $img,
            'published' => $published
        ];
        $id = insert('results', $results);
        $results = selectOne('results', ['id' => $id]);
        $okMsg = "Достижение создано и добавлено в БД!";
        header('location: '.BASE_URL."admin/results/index.php");
        }
}

// Редактирование записи - на этапе загрузки edit.php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $results = selectOne('results', ['id' => $id]);
    $id = $results['id'];
    $title = $results['title'];
    $content = $results['content'];
    if (empty($results['img'])) {
        $img = "assets/icons/foto-no.svg";
    }else{
        $img = $results['img'];
    }
    $id_temp = ['id' => $results['id_topic']];
    $name_topic = selectOne('topics', $id_temp);
    $id_topicName = $name_topic['name'];
}

// Редактирование записи - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['results-editBtn'])){
    
    $id = $_POST['id'];
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['results-categories'];
    $title = trim($_POST['results-title']);
    $content = trim($_POST['results-content']);
    if ((empty($_POST['results-titleImgFile'])) && (!empty($_POST['fileInDB']))) {
        $img = $_POST['fileInDB'];    
    }else{
        $img = $_POST['results-titleImgFile'];
    }

    if($title === ''){
        $errMsg = "Название достижения не должно быть пустым!";
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        $errMsg = "Название достижения не может быть короче 7 символов!";
    }else{
        $results = [
            'id' => $id,
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'content' => $content,
            'img' => $img,
        ];
        update('results', $results);
        $okMsg = "Достижение в БД обновлено!";
        header('location: '.BASE_URL."admin/results/index.php");
    }
}

// Удаление достижения
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('results', ['id' => $id], true);
    header('location: '.BASE_URL."admin/results/index.php");
}

// Публикация достижения вкл.\выкл.
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $pid=['id' => $_GET['pub_id']];
    $publish = selectOne('results', $pid);
    $ttt = $publish['published'] === '1' ? '0' : '1';
    $temp_arr = [
            'id' => $publish['id'],
            'published' => $ttt
    ];
    update('results', $temp_arr);
    header('location: '.BASE_URL."admin/results/index.php");
}