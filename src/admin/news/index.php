<?php 
    include "../../path.php";
    include "../../app/controllers/news.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ НОВОСТЯМИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__news">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить новость</a>
                <a href="index.php">Управление постами</a>
            </div>
            <h2>Управление постами новостей и акций</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title" title="
                    Заголовок новости.{Отображается на странице новости}"><b>Название</b></div>
                    <div class="rowT-topic"><b>Категория</b></div>
                    <div class="rowT-author"><b>Автор</b></div>
                    <div class="rowT-dateCreate"><b>Дата создания</b></div>
                    <div class="rowT-publishingStatus"><b>Статус</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <!-- Выводим список статей -->
                <?php foreach ($newsARR as $key => $news): ?>
                    <div class="row">
                    <div class="rowT-id"><?=$news['id']?></div>
                        <div class="rowT-title"><?=$news['title']?></div>
                        <div class="rowT-topic">
                            <?php
                                $id_topic = ['id' => $news['id_topic']];
                                $name_topic = selectOne('topics', $id_topic);
                                echo $name_topic['name'];
                            ?>
                        </div>
                        <div class="rowT-author">
                            <?php 
                                $name_author = ['id' => $news['id_user']];
                                $autor_topic = selectOne('users', $name_author);
                                echo $autor_topic['username'];
                            ?>
                        </div>
                        <div class="rowT-dateCreate"><?=$news['created']?></div>
                        <div class="rowT-publishingStatus">
                            <?php
                                if ($news['published']) {
                                    echo "Опубликовано";
                                }else{
                                    echo "Не опубликовано";
                                }
                            ?>
                        </div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$news['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?del_id=<?=$news['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?pub_id=<?=$news['id'];?>"><img title="Опубликовать\Снять с публикации" src="../../assets/icons/publish.svg"></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
