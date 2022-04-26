<?php 
    session_start();
    include("../../path.php");
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ КАТЕГОРИИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__topics">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="#">Создать категорию</a>
                <a href="index.php">Управление категориями</a>
            </div>
            <h2>Создание категории</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post">
                        <div class="nTitle">
                            <label for="topics-title">Название категории:</label>
                            <input required type="text" name="topics-title" id="topics-title" placeholder="Введите название категории">
                        </div>
                        <div class="nContent">
                            <label for="topics-content">Описание категории:</label>
                            <textarea name="topics-content" id="topics-content" cols="105" rows="5"></textarea>
                        </div>
                        <button class="admin_Btn" type="submit" name="topics-saveBtn">Создать категорию</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
