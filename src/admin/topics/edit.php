<?php 
    session_start();
    include "../../path.php";
    include "../../app/controllers/topics.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ КАТЕГОРИИ - АНО "Подари завтра"</title>
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
            <h2>Редактирование категории</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <!-- Форма -->
                    <form action="edit.php" method="post" accept-charset="UTF-8">
                        <input name="id" value="<?=$id;?>" type="hidden">
                        <div class="nTitle">
                            <label for="topics-name">Название категории:</label>
                            <input required type="text" value="<?= $name; ?>" name="topics-name" id="topics-name" placeholder="Введите новое название категории">
                        </div>
                        <div class="nContent">
                            <label for="topics-description">Описание категории:</label>
                            <textarea name="topics-description" id="topics-description" cols="105" rows="5" placeholder="Исправьте либо обновите описание категории (не обязательно)..."><?= $description; ?></textarea>
                        </div>
                        Пометить для раздела:
                        <select name="topics-section" id="topics-section">
                            <option selected="selected"><?=$superSection;?></option>
                            <option value="" disabled>-------------------------</option>
                            <option value="news">Новости и акции</option>
                            <option value="results">Достижения</option>
                        </select>
                        <button class="admin_Btn" type="submit" name="topics-edit-btn">Записать изменения</button>
                        <div class="topics-msg"><?=$errMsg?><p><?=$okMsg?></p></div>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    </script>
</body>
</html>
