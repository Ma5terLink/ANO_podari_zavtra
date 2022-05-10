<?php 
    include("../../path.php");
    include "../../app/controllers/photoAlbums.php";

?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ ФОТОАЛЬБОМА - АНО "Подари завтра"</title>
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
            <h2>Добавление фотоальбома</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">




                    <form action="create.php" method="post">
                        <div class="nTitle">
                            <label for="photoAlbums-title" title="Будет использовано как официальное название фотоальбома на сайте..."><b>Название фотоальбома:</b></label>
                            <input required value="<?=$title;?>" type="text" name="photoAlbums-title" id="photoAlbums-title" placeholder="Введите название фотоальбома (не менее 7 символов)...">
                        </div>
                        <div class="nContent">
                            <label for="photoAlbums-description" title="Описание фотоальбома, позволит пользователю получше узнать что вы хотите показать в этом альбоме, донести до него..."><b>Описание фотоальбома:</b></label>
                            <textarea placeholder="Добавьте описание фотоальбома..." name="photoAlbums-description" rows="5" id="photoAlbums-description""><?=$description;?></textarea>
                        </div>
                        <div class="nTitle">
                            <label for="photoAlbums-id_albums" title="Любой текст который придёт вам в голову. Это нужно для того чтобы различать фотографии в разных альбомах. Данный идентификатор будет добавлен к имени загружаемого в альбом файла. Например, для альбома СНЕГИРИ можно написать что-то вроде SNEGIRI. Да, всё не так уж сложно))..."><b>Добавьте произвольный, уникальный(!) идентификатор фотоальбома (желательно на латинице):</b></label>
                            <input required value="<?=$id_album;?>" type="text" name="photoAlbums-id_album" id="photoAlbums-id_album" placeholder="Идентификатор фотоальбома (желательно на латинице, не менее 7 символов)...">
                        </div>
                        </div>


                        
                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="photoAlbums-saveBtn">Сохранить</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
