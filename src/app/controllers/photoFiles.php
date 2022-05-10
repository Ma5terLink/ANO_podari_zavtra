<?php
    include "../../app/database/db.php";
  
$photoAlbumsARR = selectAll('photo_albums');    
$filesPhotosARR = selectAll('photo_files');
$id_albumSel = "Все";
$id_albumSelId = "";

$errMsg=[];
$id="";
$title="";
$description="";
$id_album="";
$tempA=[];











if($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    if($id_albumSelId != "") {
        foreach ($filesPhotosARR as $key => $file){
            if (strpos($file['img_name'], $id_albumSelId) !== false) {
                array_push($tempA, $file);
            }
        }  
        $filesPhotosARR = $tempA;
    }else{
        $photoAlbumsARR = selectAll('photo_albums');
    }
    
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_albumSelId = $_POST['photoFiles-albums'];
    $id_albumSel = selectOne('photo_albums', ['id_album' => $id_albumSelId])['title'];
    
    if($id_albumSelId != "") {
        foreach ($filesPhotosARR as $key => $file){
            if (strpos($file['img_name'], $id_albumSelId) !== false) {
                array_push($tempA, $file);
            }
        }  
        $filesPhotosARR = $tempA;
    }else{
        $photoAlbumsARR = selectAll('photo_albums');
    }
    
}








// Создание нового фото
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['photoFiles-saveBtn'])){

tt2($_FILES);
tt2($_POST);

    // если имя файла НЕ ПУСТОЕ
    if(!empty($_FILES['titleImgFile']['name'])){
        $imgName = $_POST['photoFiles-categories'] ."_". $_FILES['titleImgFile']['name'];
        $imgTemp = $_FILES['titleImgFile']['tmp_name'];
        $fileType = $_FILES['titleImgFile']['type'];
        $fileError = $_FILES['titleImgFile']['error'];
        $imgDestination = ROOT_PATH."/assets/img/photoFiles/".$imgName;

        if ($fileError === 1){ 
            array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            $_POST['titleImgFile'] = 'foto-no.svg';
        }
        if ($fileError === 2){
            // Размер файла больше 3.5Mb
            array_push($errMsg, "Превышен максимально допустимый размер файла! (3.5Mb)");
            $_POST['titleImgFile'] = 'foto-no.svg';
        }
        if(strpos($fileType, 'image') === false) {
            // Тип файла не соответствует картинке(image)
            array_push($errMsg, "Загружаемый файл не распознан как файл содержащий изображение!");
        }else{
            //проверяем результат загрузки КАРТИНКИ (тип соответствует image)
            $result = move_uploaded_file($imgTemp,$imgDestination);
            if($result){
                $_POST['titleImgFile'] = $imgName;
            }else{
                $_POST['titleImgFile'] = 'foto-no.svg';
                array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            }
        }
    }else{
        // Если имя файла пустое (не выбран)
        $_POST['titleImgFile'] = 'foto-no.svg';
    }

    $imgName = $_POST['titleImgFile'];
    $description = trim($_POST['photoFiles-description']);
    $published = 0;

    if (empty($errMsg))  {
        $file = [
            'img_name' => $imgName,
            'description' => $description,
            'published' => $published
        ];
        $id = insert('photo_files', $file);
        header('location: '.BASE_URL."admin/photoFiles/index.php");
    }
}











// Редактирование записи - на этапе загрузки edit.php
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $foto = selectOne('photo_files', ['id' => $id]);
    // $id = $foto['id'];
    $description = $foto['description'];
    $img = $foto['img_name'];

    $underlineFirstPosition = strpos($foto['img_name'], "_");
    $neededAlbumId = substr($foto['img_name'],0,$underlineFirstPosition);
    $neededAlbumTitle = selectOne('photo_albums', ['id_album' => $neededAlbumId])['title'];
    if ($neededAlbumTitle == "") {
        $neededAlbumTitle = "Выбрать...";
    }
}












// Редактирование записи - действия после нажатия кнопки submit
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['photoFiles-editBtn'])){
    
    // tt2($_FILES);
    // tt($_POST);
    
    // если имя файла НЕ ПУСТОЕ
    if(!empty($_FILES['titleImgFile']['name'])){
        $imgName = $_POST['photoFiles-categories'] ."_". $_FILES['titleImgFile']['name'];
        $imgTemp = $_FILES['titleImgFile']['tmp_name'];
        $fileType = $_FILES['titleImgFile']['type'];
        $fileError = $_FILES['titleImgFile']['error'];
        $imgDestination = ROOT_PATH."/assets/img/photoFiles/".$imgName;
        
        if ($fileError === 1){ 
            array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            $_POST['titleImgFile'] = 'foto-no.svg';
        }
        // проверяем файл на соответствие типу image
        if ($fileError === 2){
            // Размер файла больше 3.5Mb
            array_push($errMsg, "Превышен максимально допустимый размер файла! (3.5Mb)");
            $_POST['titleImgFile'] = 'foto-no.svg';
        }
        if(strpos($fileType, 'image') === false) {
            // Тип файла не соответствует картинке(image)
            array_push($errMsg, "Загружаемый файл не распознан как файл содержащий изображение!");
        }else{
            //проверяем результат загрузки КАРТИНКИ (тип соответствует image)
            $result = move_uploaded_file($imgTemp,$imgDestination);
            if($result){
                $_POST['titleImgFile'] = $imgName;
            }else{
                array_push($errMsg, "Загрузка файла не удалась! Что-то пошло не так...");
            }
        }
    }else{
        if(empty($_POST['fileInDB'])) {
        // Если имя файла пустое (не выбран)
            $_POST['titleImgFile'] = 'foto-no.svg';
        }else{
            $_POST['titleImgFile'] = $_POST['fileInDB'];
        }
    }
    
    $id = $_POST['id'];
    $description = trim($_POST['photoFiles-description']);
    $imgName = $_POST['titleImgFile'];


    if (empty($errMsg)) {
        $foto = [
            'id' => $id,
            'description' => $description,
            'img_name' => $imgName
        ];
        update('photo_files', $foto);
        header('location: '.BASE_URL."admin/photoFiles/index.php");
    }
}










// Удаление фото из БД
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['del_id'])){
    $id=$_GET['del_id'];
    delete('photo_files', ['id' => $id], true);
    header('location: '.BASE_URL."admin/photoFiles/index.php");
}














// Публикация фото вкл.\выкл.
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){
    $pid=['id' => $_GET['pub_id']];
    $publish = selectOne('photo_files', $pid);
    if ($publish['img_name'] !== "foto-no.svg" && $publish['img_name'] !== "") {
        $ttt = $publish['published'] === '1' ? '0' : '1';
        $temp_arr = [
                'id' => $publish['id'],
                'published' => $ttt
        ];
        update('photo_files', $temp_arr);
    }
    header('location: '.BASE_URL."admin/photoFiles/index.php");
}









