<?php 
    include "../../path.php";
    include "../../app/controllers/linksHealth.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ КНОПКАМИ ЗДОРОВЬЯ - АНО "Подари завтра"</title>
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
            <h2>Управление "кнопками здоровья"</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Название</b></div>
                    <div class="rowT-descr"><b>Краткое описание</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <!-- Выводим список статей -->
                <?php foreach ($linksARR as $key => $link): ?>
                    <div class="row">
                    <div class="rowT-id"><?=$link['id']?></div>
                        <div class="rowT-title"><?=$link['title']?></div>
                        <div class="rowT-descr"><?=$link['content']?></div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$link['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?del_id=<?=$link['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
