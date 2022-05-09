<?php
    include "../../app/database/db.php";
    
$errMsg=[];
$id="";
$title="";
$content="";
$p_date="";

$newsARR = selectAll('news');
$topicsARR = selectAll('topics');










// Создание новой новости\акции
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news-saveBtn'])){

    // если имя файла НЕ ПУСТОЕ
    if(!empty($_FILES['news-titleImgFile']['name'])){
        $imgName = time()."_".$_FILES['news-titleImgFile']['name'];
        $imgTemp = $_FILES['news-titleImgFile']['tmp_name'];
        $fileType = $_FILES['news-titleImgFile']['type'];
        $fileError = $_FILES['news-titleImgFile']['error'];
        $imgDestination = ROOT_PATH."/assets/img/news/".$imgName;

        // проверяем файл на соответствие типу image
        if ($fileError === 2){
            // Размер файла больше 400Kb
            array_push($errMsg, "Превышен допустимый размер файла! (400Kb)");
            $_POST['news-titleImgFile'] = 'foto-no.svg';
            
        }elseif(strpos($fileType, 'image') === false) {
            // Тип файла не соответствует картинке(image)
            array_push($errMsg, "Загружаемый файл не является картинкой!");
        }else{
            //проверяем результат загрузки КАРТИНКИ (тип соответствует image)
            $result = move_uploaded_file($imgTemp,$imgDestination);
            if($result){
                $_POST['news-titleImgFile'] = $imgName;
            }else{
                $_POST['news-titleImgFile'] = 'foto-no.svg';
                array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            }
        }
    }else{
        // Если имя файла пустое (не выбран)
        $_POST['news-titleImgFile'] = 'foto-no.svg';
    }

    $title = trim($_POST['news-title']);
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['news-categories'];
    $content = trim($_POST['news-content']);
    $shortContent = $_POST['news-short-content'];
    $published = 0;

    if($title === ''){
        array_push($errMsg, "Заполните название новости\акции!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название новости не может быть короче 7 символов!");
    }
    if (empty($errMsg))  {
        $news = [
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'short_content' => $shortContent,
            'content' => $content,
            'img' => $_POST['news-titleImgFile'],
            'published' => $published
        ];
        $id = insert('news', $news);
        $news = selectOne('news', ['id' => $id]);
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
    $img = $news['img'];
    $id_temp = ['id' => $news['id_topic']];
    $name_topic = selectOne('topics', $id_temp);
    $id_topicName = $name_topic['name'];
    // $ggg = $_GET['news-titleImgFile'];
    $p_date = $news['published_date'];
    $p_year = substr($p_date,0,4);
    $p_month = substr($p_date,5,2);
    $p_day = substr($p_date,8,2);
    $short_content = $news['short_content'];
}












// Редактирование записи - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['news-editBtn'])){
    
    // если имя файла НЕ ПУСТОЕ
    if(!empty($_FILES['news-titleImgFile']['name'])){
        $imgName = time()."_".$_FILES['news-titleImgFile']['name'];
        $imgTemp = $_FILES['news-titleImgFile']['tmp_name'];
        $fileType = $_FILES['news-titleImgFile']['type'];
        $fileError = $_FILES['news-titleImgFile']['error'];
        $imgDestination = ROOT_PATH."/assets/img/news/".$imgName;
        
        // проверяем файл на соответствие типу image
        if ($fileError === 2){
            // Размер файла больше 400Kb
            array_push($errMsg, "Превышен допустимый размер файла! (400Kb)");
            $_POST['news-titleImgFile'] = 'foto-no.svg';
        }elseif(strpos($fileType, 'image') === false) {
            // Тип файла не соответствует картинке(image)
            array_push($errMsg, "Загружаемый файл не является картинкой!");
        }else{
            //проверяем результат загрузки КАРТИНКИ (тип соответствует image)
            $result = move_uploaded_file($imgTemp,$imgDestination);
            if($result){
                $_POST['news-titleImgFile'] = $imgName;
            }else{
                array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            }
        }
    }else{
        if(empty($_POST['fileInDB'])) {
        // Если имя файла пустое (не выбран)
            $_POST['news-titleImgFile'] = 'foto-no.svg';
        }else{
            $_POST['news-titleImgFile'] = $_POST['fileInDB'];
        }
    }
    
    $id = $_POST['id'];
    $id_user = $_SESSION['id'];
    $id_topic = $_POST['news-categories'];
    $title = trim($_POST['news-title']);
    $content = trim($_POST['news-content']);
    $img = $_POST['news-titleImgFile'];
    $publish_day = $_POST['public_date_day'];
    $publish_month = $_POST['public_date_month'];
    $publish_year = $_POST['public_date_year'];
    $publish_date = $publish_year."-".$publish_month."-".$publish_day;
    $shortContent = $_POST['news-short-content'];

    if($title === ''){
        array_push($errMsg, "Название новости не должно быть пустым!");
    }elseif (mb_strlen($title,'UTF8') < 7){ 
        array_push($errMsg, "Название новости не может быть короче 7 символов!");
    }
    if (empty($errMsg)) {
        $news = [
            'id' => $id,
            'id_user' => $id_user,
            'id_topic'=> $id_topic,
            'title' => $title,
            'short_content' => $shortContent,
            'content' => $content,
            'img' => $img,
            'published_date' => $publish_date
        ];
        update('news', $news);
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









