<?php 
    include("../../path.php");
    include "../../app/controllers/linksHealth.php";

?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ КНОПКИ ЗДОРОВЬЯ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__links">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="index.php">Управление "кнопками здоровья"</a>
            </div>
            <h2>Добавление "кнопки здоровья"</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="nTitle">
                            <label for="links-title"><b>Название кнопки:</b></label>
                            <input required value="<?=$title;?>" type="text" name="links-title" id="links-title" placeholder="Введите название кнопки (не менее 7 символов)...">
                        </div>
                        <div class="nContent">
                            <label for="links-content"><b>Описание болезни:</b></label>
                            <textarea placeholder="Добавьте описание болезни..." name="links-content" cols="100" rows="5" id="links-content""><?=$content;?></textarea>
                        </div>
                        <label for="links-list"><b>Отметьте рекоммендуемые терапии:</b></label>
                        <div class="links-list" name="links-list" id="links-list">
                        <?php foreach ($therapysARR as $key => $item): ?>
                            <div>
                                <input type="checkbox" name="links-item-<?=$item['id'];?>" id="links-item-<?=$item['id'];?>">
                                <label for="links-item-<?=$item['id'];?>"><?=$item['title'];?></label>
                            </div>
                        <?php endforeach; ?>
                        </div>


                        
                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="links-saveBtn">Сохранить</button>
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
