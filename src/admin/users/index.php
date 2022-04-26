<?php 
    session_start();
    include("../../path.php");
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ ПОЛЬЗОВАТЕЛЯМИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__users">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="#">Управление пользователями</a>
            </div>
            <h2>Управление пользователями</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Логин</b></div>
                    <div class="rowT-email"><b>E-mail</b></div>
                    <div class="rowT-role"><b>Роль</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <div class="row">
                <div class="rowT-id">20</div>
                    <div class="rowT-title">kamelot1</div>
                    <div class="rowT-email">ddee@yandex.ru</div>
                    <div class="rowT-role">Пользователь</div>
                    <div class="rowT-editorBtn">
                        <div class="colGREEN"><a href="">Edit</a></div>
                        <div class="colRED"><a href="">Delete</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rowT-id">19</div>
                    <div class="rowT-title">shantsunG</div>
                    <div class="rowT-email">shaa@inbox.ru</div>
                    <div class="rowT-role">Администратор</div>
                    <div class="rowT-editorBtn">
                        <div class="colGREEN"><a href="">Edit</a></div>
                        <div class="colRED"><a href="">Delete</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
