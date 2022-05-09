<?php 
    include("../../path.php");
    include "../../app/controllers/linksHealth.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ КНОПКИ ЗДОРОВЬЯ - АНО "Подари завтра"</title>
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
            <h2>Редактирование "кнопки здоровья"</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <div class="nTitle">
                            <label for="links-title"><b>Название кнопки (<span>не подлежит изменению</span>):</b></label>
                            <input readonly value="<?=$title;?>" type="text" name="links-title" id="links-title" placeholder="Отредактируйте название кнопки...">
                        </div>
                        <div class="nContent">
                            <label for="links-content"><b>Описание болезни:</b></label>
                            <textarea placeholder="Отредактируйте описание болезни..." name="links-content" id="links-content" cols="105" rows="5"><?=$content;?></textarea>
                        </div>

                        <label for="links-list"><b>Отметьте рекоммендуемые терапии:</b></label>
                        <div class="links-list" name="links-list" id="links-list">
                        <?php $i=0; ?>
                        <?php foreach ($therapysARR as $key => $item): ?>
                            <div>
                                <?php if($re[$i]['id'] === $item['id']): ?>
                                    <input type="checkbox" checked name="links-item-<?=$item['id'];?>" id="links-item-<?=$item['id'];?>">
                                    <label for="links-item-<?=$item['id'];?>"><?=$item['title'];?></label>
                                    <?php $i++; ?>
                                <?php else: ?>
                                    <input type="checkbox" name="links-item-<?=$item['id'];?>" id="links-item-<?=$item['id'];?>">
                                    <label for="links-item-<?=$item['id'];?>"><?=$item['title'];?></label>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
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
