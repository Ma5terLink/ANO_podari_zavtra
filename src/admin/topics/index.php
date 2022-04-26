<?php 
    session_start();
    include("../../path.php");
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
                <a href="#">Управление категориями</a>
            </div>
            <h2>Управление категориями</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Название</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>

                </div>
                <div class="row">
                <div class="rowT-id">54</div>
                    <div class="rowT-title">ДЦП</div>
                    <div class="rowT-editorBtn">
                        <div class="colGREEN"><a href="">Edit</a></div>
                        <div class="colRED"><a href="">Delete</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rowT-id">21</div>
                    <div class="rowT-title">Поездки</div>
                    <div class="rowT-editorBtn">
                        <div class="colGREEN"><a href="">Edit</a></div>
                        <div class="colRED"><a href="">Delete</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rowT-id">11</div>
                    <div class="rowT-title">Благотворительность</div>
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
