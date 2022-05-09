<?php
    include "../../app/database/db.php";
    
$errMsg=[];
$id='';
$title="";
$content="";

$resultsARR = selectAll('results');
$topicsARR = selectAll('topics');

// Создание нового достижения
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['results-saveBtn'])){

    // tt($_FILES);

    // если имя файла НЕ ПУСТОЕ
    if(!empty($_FILES['results-titleImgFile']['name'])){
        $imgName = time()."_".$_FILES['results-titleImgFile']['name'];
        $imgTemp = $_FILES['results-titleImgFile']['tmp_name'];
        $fileType = $_FILES['results-titleImgFile']['type'];
        $fizeSize = ($_FILES['results-titleImgFile']['size']);
        $imgDestination = ROOT_PATH."/assets/img/results/".$imgName;
        // проверяем файл на соответствие типу image
        if (strpos($fileType, 'image') === false) {
            // Тип файла не соответствует картинке(image)
            array_push($errMsg, "Загружаемый файл не является картинкой!");
        }elseif($fileSize > 300000){
                // Размер файла больше 300Kb
                array_push($errMsg, "Превышен допустимый размер файла! (300Kb)");
            }else{
            //проверяем результат загрузки КАРТИНКИ (тип соответствует image)
            $result = move_uploaded_file($imgTemp,$imgDestination);
            if($result){
                $_POST['results-titleImgFile'] = $imgName;
            }else{
                $_POST['results-titleImgFile'] = 'foto-no.svg';
                array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            }
        }
    }else{
        // Если имя файла пустое (не выбран)
        $_POST['results-titleImgFile'] = 'foto-no.svg';
    }

    $title = trim($_POST['results-title']);
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['results-categories'];
    $content = trim($_POST['results-content']);
    $shortContent = $_POST['results-short-content'];
    $published = 0;

    if($title === ''){
        array_push($errMsg, "Заполните название достижения!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название достижения не может быть короче 7 символов!");
    }
    if (empty($errMsg))  {
        $results = [
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'short_content' => $shortContent,
            'content' => $content,
            'img' => $_POST['results-titleImgFile'],
            'published' => $published
        ];
        $id = insert('results', $results);
        $results = selectOne('results', ['id' => $id]);
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
    $img = $results['img'];
    $id_temp = ['id' => $results['id_topic']];
        $name_topic = selectOne('topics', $id_temp);
        $id_topicName = $name_topic['name'];
    $p_date = $results['published_date'];
    $p_year = substr($p_date,0,4);
    $p_month = substr($p_date,5,2);
    $p_day = substr($p_date,8,2);
    $short_content = $results['short_content'];
}












// Редактирование записи - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['results-editBtn'])){
    
    // если имя файла НЕ ПУСТОЕ
    if(!empty($_FILES['results-titleImgFile']['name'])){
        $imgName = time()."_".$_FILES['results-titleImgFile']['name'];
        $imgTemp = $_FILES['results-titleImgFile']['tmp_name'];
        $fileType = $_FILES['results-titleImgFile']['type'];
        $fizeSize = $_FILES['results-titleImgFile']['size'];
        $imgDestination = ROOT_PATH."/assets/img/results/".$imgName;
        
        // проверяем файл на соответствие типу image
        if (strpos($fileType, 'image') === false) {
            // Тип файла не соответствует картинке(image)
            array_push($errMsg, "Загружаемый файл не является картинкой!");
        }elseif($fileSize > 300000){
            // Размер файла больше 300Kb
            array_push($errMsg, "Превышен допустимый размер файла (300Kb)!");
        }else{
            //проверяем результат загрузки КАРТИНКИ (тип соответствует image)
            $result = move_uploaded_file($imgTemp,$imgDestination);
            if($result){
                $_POST['results-titleImgFile'] = $imgName;
            }else{
                array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            }
        }
    }else{
        if(empty($_POST['fileInDB'])) {
        // Если имя файла пустое (не выбран)
            $_POST['results-titleImgFile'] = 'foto-no.svg';
        }else{
            $_POST['results-titleImgFile'] = $_POST['fileInDB'];
        }
    }

    $id = $_POST['id'];
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['results-categories'];
    $title = trim($_POST['results-title']);
    $content = trim($_POST['results-content']);
    $img = $_POST['results-titleImgFile'];
    $publish_day = $_POST['public_date_day'];
    $publish_month = $_POST['public_date_month'];
    $publish_year = $_POST['public_date_year'];
    $publish_date = $publish_year."-".$publish_month."-".$publish_day;
    $shortContent = $_POST['results-short-content'];

    if($title === ''){
        array_push($errMsg, "Название достижения не должно быть пустым!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название достижения не может быть короче 7 символов!");
    }
    if (empty($errMsg)) {
        $results = [
            'id' => $id,
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'short_content' => $shortContent,
            'content' => $content,
            'img' => $img,
            'published_date' => $publish_date
        ];
        update('results', $results);
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