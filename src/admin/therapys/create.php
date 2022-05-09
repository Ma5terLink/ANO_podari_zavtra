<!-- worked -->
<?php 
    include("../../path.php");
    include "../../app/controllers/therapys.php";

?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ ТЕРАПИИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__therapys">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="index.php">Управление категориями терапий</a>
            </div>
            <h2>Добавление терапии</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                        <div class="nTitle">
                            <label for="therapys-title">Название терапии:</label>
                            <input required value="<?=$title;?>" type="text" name="therapys-title" id="therapys-title" placeholder="Введите название терапии (не менее 7 символов)">
                        </div>
                        <div class="nContent">
                            <label for="therapys-content">Полное описание терапии:</label>
                            <textarea placeholder="Добавьте содержание статьи..." name="therapys-content" id="editor""><?=$content;?></textarea>
                        </div>

                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="therapys-saveBtn">Сохранить</button>
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
