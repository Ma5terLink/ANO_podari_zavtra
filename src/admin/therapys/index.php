<!-- worked -->
<?php 
    include "../../path.php";
    include "../../app/controllers/therapys.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ ТЕРАПИЯМИ - АНО "Подари завтра"</title>
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
            <h2>Управление категориями терапий</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title" title="Заголовок новости.{Отображается на странице новости}"><b>Название</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <!-- Выводим список статей -->
                <?php foreach ($therapysARR as $key => $item): ?>
                    <div class="row">
                    <div class="rowT-id"><?=$item['id']?></div>
                        <div class="rowT-title" title="<?=$item['content'];?>"><?=$item['title']?></div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$item['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="edit.php?del_id=<?=$item['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
