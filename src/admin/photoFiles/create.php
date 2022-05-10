<?php 
    include("../../path.php");
    include "../../app/controllers/photoFiles.php";

?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ ФОТОГРАФИИ - АНО "Подари завтра"</title>
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
            <h2>Добавление фотографии</h2>


            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form id="form-photoFiles-create" action="create.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3584000">
                        
                        <div class="photoFiles-img-create">
                            <div class="nImg">
                                <img id="previewIMG" src="<?php echo BASE_URL."assets/icons/foto-no.svg"?>" alt="nImg">
                            </div>
                        </div>

                        <div class="nFile">
                            <input type="file" id="titleImgFile" name="titleImgFile" accept=".png,.jpg,.jpeg,.svg,.bmp,.ico">
                            <label for="titleImgFile"></label>
                        </div>

                        <div class="nShort-Content">
                            <label for="photoFiles-description">Описание фотографии:</label>
                            <textarea placeholder="Добавьте описание фотографии..." name="photoFiles-description" id="photoFiles-description" cols="105" rows="5"><?=$description;?></textarea>
                        </div>

                        <div class="nCat">
                            <label for="nSel">Поместить в фотоальбом:</label>
                            <select id="nSel" name="photoFiles-categories">
                                <?php foreach ($photoAlbumsARR as $key => $album): ?>
                                    <option value="<?=$album['id_album']?>"><?=$album['title']?></option> 
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="photoFiles-saveBtn">Добавить</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    <script src="<?php echo BASE_URL ?>assets/js/script2.js"></script>
</body>
</html>
