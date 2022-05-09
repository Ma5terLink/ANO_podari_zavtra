<?php 
    include("../../path.php");
    include "../../app/controllers/results.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ ДОСТИЖЕНИЯМИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__results">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить достижение</a>
                <a href="index.php">Управление постами достижений</a>
            </div>
            <h2>Управление постами достижений</h2>
            <div class="postsGrid">
                <div class="rowT">
                <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title" title="Заголовок новости.{Отображается на странице новости}"><b>Название</b></div>
                    <div class="rowT-topic"><b>Категория</b></div>
                    <div class="rowT-author"><b>Автор</b></div>
                    <div class="rowT-dateCreate"><b>Дата создания</b></div>
                    <div class="rowT-publishingStatus"><b>Статус</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <!-- Выводим список статей -->
                <?php foreach ($resultsARR as $key => $results): ?>
                    <div class="row">
                    <div class="rowT-id"><?=$results['id']?></div>
                        <div class="rowT-title"><?=$results['title']?></div>
                        <div class="rowT-topic">
                            <?php
                                $id_topic = ['id' => $results['id_topic']];
                                $name_topic = selectOne('topics', $id_topic);
                                echo $name_topic['name'];
                            ?>
                        </div>
                        <div class="rowT-author">
                            <?php 
                                $name_author = ['id' => $results['id_user']];
                                $autor_topic = selectOne('users', $name_author);
                                echo $autor_topic['username'];
                            ?>
                        </div>
                        <div class="rowT-dateCreate"><?=$results['created']?></div>
                        <div class="rowT-publishingStatus">
                            <?php
                                if ($results['published']) {
                                    echo "Опубликовано"."<br>".$results['published_date'];
                                }else{
                                    echo "Не опубликовано";
                                }
                            ?>
                        </div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$results['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?del_id=<?=$results['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?pub_id=<?=$results['id'];?>"><img title="Опубликовать\Снять с публикации" src="../../assets/icons/publish.svg"></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
