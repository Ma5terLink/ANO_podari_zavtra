<?php
    include "../../app/database/db.php";
    
$errMsg="";
$okMsg="";
$id="";
$name="";
$description="";
$superSection="";

$topicsARR = selectAll('topics');


// Создание новой категории
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-create'])){

    $name = trim($_POST['topics-name']);
    $description = $_POST['topics-description'];
    $superSection = trim($_POST['topics-section']);

    if($name === ''){
        $errMsg = "Заполните название категории!";
    }elseif (mb_strlen($name,'UTF8') < 2){ 
        $errMsg = "Название категории не может быть короче 2х символов!";
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name) {
            $errMsg = "Данная категория уже существует в БД!";
        }else{
            if ($superSection === "news") {
                $superSection = "news";
            }else{
                $superSection = "results";
            }
            $topics = [
                'name' => $name,
                'description' => $description,
                'superSection' => $superSection
            ];
            $id = insert('topics', $topics);
            $topic = selectOne('topics', ['id' => $id]);
            $okMsg = "Категория создана и добавлена в БД!";
            header('location: '.BASE_URL."admin/topics/index.php");
            }
        }
}









// Редактирование категории - на этапе загрузки edit.php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $topic = selectOne('topics', ['id' => $id]);
    
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
    if (empty($topic['superSection'])) $superSection = "news";
    if ($topic['superSection'] === 'news') {
        $superSection = "Новости и акции";
    }else{
        $superSection = "Достижения";
    }
}










// Редактирование категории - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['topics-edit-btn'])){

    $id = $_POST['id'];
    $name = trim($_POST['topics-name']);
    $description = trim($_POST['topics-description']);
    $superSection = trim($_POST['topics-section']);


    if($name === ''){
        $errMsg = "Заполните название категории!";
    }elseif (mb_strlen($name,'UTF8') < 2){ 
        $errMsg = "Название категории не может быть короче 2х символов!";
    }else{
        $existence = selectOne('topics', ['name' => $name]);
        if(!empty($existence['name']) && $existence['name'] === $name && $existence['id'] !== $id) {
            $errMsg = "Категория с таким названием уже существует в БД!";
        }else{
            if ($superSection === "news") {
                $superSection = "news";
            }else{
                $superSection = "results";
            }
            $topics = [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'superSection' => $superSection
            ];
            update('topics', $topics);
            $okMsg = "Категория в БД обновлена!";
            header('location: '.BASE_URL."admin/topics/index.php");
        }
    }
}













// Удаление категории - на этапе загрузки edit.php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('topics', ['id' => $id], true);
    header('location: '.BASE_URL."admin/topics/index.php");
}