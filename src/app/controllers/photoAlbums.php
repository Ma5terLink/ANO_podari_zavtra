<?php
    include "../../app/database/db.php";

$albumsARR = selectAll('photo_albums');

$errMsg=[];
$title="";
$description="";
$id_album="";












if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['photoAlbums-saveBtn'])){

    $title = trim($_POST['photoAlbums-title']);
    $description = trim($_POST['photoAlbums-description']);
    $id_album = trim($_POST['photoAlbums-id_album']);

    if($title === '' || $description === '' || $id_album === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название альбома не должно быть короче 7 символов!");
    }elseif (mb_strlen($id_album,'UTF8') < 7){ 
        array_push($errMsg, "Название идентификатора не должно быть короче 7 символов!");
    }elseif (!empty(selectAll('photo_albums', ['id_album' => $id_album]))) { 
        array_push($errMsg, "Идентификатор не уникален!");
    }
    if (empty($errMsg))  {
        $album = [
            'title' => $title,
            'description' => $description,
            'id_album' => $id_album
        ];
        $id = insert('photo_albums', $album);
        header('location: '.BASE_URL."admin/photoAlbums/index.php");
    }

}












if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $pA = selectOne('photo_albums', ['id' => $id]);
    $title = $pA['title'];
    $description = $pA['description'];
    $id_album = $pA['id_album'];
}







if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['links-editBtn'])){

    $title = trim($_POST['photoAlbums-title']);
    $description = trim($_POST['photoAlbums-description']);

    if($title === '' || $description === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название альбома не должно быть короче 7 символов!");
    }
    if (empty($errMsg))  {
        $album = [
            'id' => $_POST['id'],
            'title' => $title,
            'description' => $description
        ];
        $id = update('photo_albums', $album);
        header('location: '.BASE_URL."admin/photoAlbums/index.php");
    }

}














// Удаление кнопки
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('photo_albums', ['id' => $id], true);
    header('location: '.BASE_URL."admin/photoAlbums/index.php");
}
