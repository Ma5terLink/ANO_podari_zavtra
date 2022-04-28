<?php 
    session_start();
    include("../../path.php");
    include "../../app/controllers/topics.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ КАТЕГОРИЯМИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__topics">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Создать категорию</a>
                <a href="index.php">Управление категориями</a>
            </div>
            <h2>Управление категориями</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Название категории</b></div>
                    <div class="rowT-descr"><b>Описание</b></div>
                    <div class="rowT-superSection"><b>В разделе</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <?php foreach ($topicsARR as $key => $topic): ?>
                <div class="row">
                    <div class="rowT-id"><?= $topic['id'] ?></div>
                        <div class="rowT-title"><?= $topic['name']; ?></div>
                        <div class="rowT-descr"><?= $topic['description']; ?></div>
                        <div class="rowT-superSection">
                            <?php
                            switch ($topic['superSection']) {
                                case 'news':
                                    echo "Новости и акции";
                                    break;
                                case 'results':
                                    echo "Достижения";
                                    break;
                                }
                            ?>
                        </div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$topic['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?del_id=<?=$topic['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                        </div>
                    </div>
                
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
