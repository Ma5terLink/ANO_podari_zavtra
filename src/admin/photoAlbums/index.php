<?php 
    include "../../path.php";
    include "../../app/controllers/photoAlbums.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>НАСТРОЙКА И СОЗДАНИЕ ФОТОАЛЬБОМОВ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__photoAlbums">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="index.php">Управление фотоальбомами</a>
            </div>
            <h2>Управление фотоальбомами</h2>




            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Название фотоальбома</b></div>
                    <div class="rowT-descr"><b>Описание</b></div>
                    <div class="rowT-superSection"><b>Идентификатор</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <!-- Выводим список статей -->
                <?php foreach ($albumsARR as $key => $albums): ?>
                    <div class="row">
                    <div class="rowT-id"><?=$lialbumsnk['id']?></div>
                        <div class="rowT-title"><?=$albums['title']?></div>
                        <div class="rowT-descr"><?=$albums['description']?></div>
                        <div class="rowT-superSection"><?=$albums['id_album']?></div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$albums['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?del_id=<?=$albums['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>




        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
