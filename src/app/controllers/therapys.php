<!-- worked -->
<?php
    include "../../app/database/db.php";

$errMsg=[];
$id="";
$title="";
$content="";

$therapysARR = selectAll('therapys');


// Создание новой новости\акции
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['therapys-saveBtn'])){

    $title = $_POST['therapys-title'];
    $content = trim($_POST['therapys-content']);

    if($title === ''){
        array_push($errMsg, "Заполните название терапии!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название терапии не должно быть короче 7 символов!");
    }
    if (empty($errMsg))  {
        $therapys = [
            'title' => $title,
            'content' => $content,
        ];
        $id = insert('therapys', $therapys);
        $therapy = selectOne('therapys', ['id' => $id]);
        header('location: '.BASE_URL."admin/therapys/index.php");
    }
}










// Редактирование записи, проброс основных данных для полей - на этапе загрузки edit.php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $therapy = selectOne('therapys', ['id' => $id]);
    $id = $therapy['id'];
    $title = $therapy['title'];
    $content = $therapy['content'];
}













// Редактирование записи - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['therapys-editBtn'])){
    
    $id = $_POST['id'];
    $title = $_POST['therapys-title'];
    $content = trim($_POST['therapys-content']);

    if($title === ''){
        array_push($errMsg, "Название терапии не должно быть пустым!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название терапии не должно быть короче 7 символов!");
    }
    if (empty($errMsg)) {
        $therapy = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
        ];
        update('therapys', $therapy);
        header('location: '.BASE_URL."admin/therapys/index.php");
    }
}











// Удаление терапии
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('therapys', ['id' => $id], true);
    header('location: '.BASE_URL."admin/therapys/index.php");
}


