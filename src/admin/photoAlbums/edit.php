<?php 
    include("../../path.php");
    include "../../app/controllers/photoAlbums.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ ФОТОАЛЬБОМА - АНО "Подари завтра"</title>
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
            <h2>Редактирование фотоальбома</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">


                    <form action="edit.php" method="post">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <div class="nTitle">
                            <label for="photoAlbums-title"><b>Название фотоальбома:</b></label>
                            <input value="<?=$title;?>" type="text" name="photoAlbums-title" id="photoAlbums-title" placeholder="Отредактируйте название фотоальбома...">
                        </div>
                        <div class="nContent">
                            <label for="photoAlbums-description"><b>Описание фотоальбома:</b></label>
                            <textarea placeholder="Отредактируйте описание фотоальбома..." name="photoAlbums-description" id="photoAlbums-description" rows="5"><?=$description;?></textarea>
                        </div>
                        <div class="nTitle">
                            <label for="photoAlbums-id_album"><b>Идентификатор фотоальбома (<span>не подлежит изменению</span>):</b></label>
                            <input readonly value="<?=$id_album;?>" type="text" name="photoAlbums-id_album" id="photoAlbums-id_album">
                        </div>

                        
                     
                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="links-editBtn">Сохранить запись</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    <!-- <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script src="../../assets/js/scripts.js"></script> -->
    <script src="../../assets/js/ckeditor.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>
