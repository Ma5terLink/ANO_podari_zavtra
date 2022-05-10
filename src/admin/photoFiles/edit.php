<?php 
    include("../../path.php");
    include "../../app/controllers/photoFiles.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ ФОТОГРАФИИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__photoFiles">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="index.php">Управление фотографиями</a>
            </div>
            <h2>Редактирование фотографии</h2>


            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3584000">  
                        <input type="hidden" value="<?=$id?>" name="id">

                        <div class="photoFiles-img-create">
                            <div class="nImg">
                                <?php if($img != 'foto-no.svg'): ?>
                                        <img id="previewIMG" src="<?php echo BASE_URL."assets/img/photoFiles/".$img?>" alt="nImg">
                                    <?php else: ?>
                                        <img src="<?php echo BASE_URL."assets/icons/foto-no.svg"?>" alt="nImg">
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="nFile">
                            <input type="hidden" value="<?=$img?>" name="fileInDB">
                            <input type="file" id="titleImgFile" name="titleImgFile" accept=".png,.jpg,.jpeg,.svg,.bmp,.ico">
                            <?php if($img === "foto-no.svg"): ?>
                                    <label for="titleImgFile">В БД нет привязанного изображения. Используется "заглушка".</label>
                                <?php else: ?>
                                    <label for="titleImgFile">Используется ранее загруженное изображение.</label>
                            <?php endif; ?>
                        </div>

                        <div class="nShort-Content">
                            <label for="photoFiles-description">Описание фотографии:</label>
                            <textarea placeholder="Отредактируйте описание фотографии..." name="photoFiles-description" id="photoFiles-description" cols="105" rows="5"><?=$description;?></textarea>
                        </div>

                        <div class="nCat">
                            <label for="photoFiles-categories">Пеместить в фотоальбом:</label>
                            <select id="photoFiles-categories" name="photoFiles-categories">
                                    <option selected value="<?=$neededAlbumId;?>"><?=$neededAlbumTitle;?></option>
                                    <option disabled>-------------------------</option>
                                <?php foreach ($photoAlbumsARR as $key => $album): ?>
                                    <option value="<?=$album['id_album']?>"><?=$album['title']?></option> 
                                <?php endforeach; ?>
                            </select>
                        </div>                     


                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="photoFiles-editBtn">Сохранить запись</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    <script src="../../assets/js/script2.js"></script>
</body>
</html>
