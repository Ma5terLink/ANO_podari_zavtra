<?php 
    session_start();
    include("../../path.php");
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
                <a href="#">Управление постами</a>
            </div>
            <h2>Управление постами новостей и акций</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Название</b></div>
                    <div class="rowT-author"><b>Автор</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <div class="row">
                <div class="rowT-id">54</div>
                    <div class="rowT-title">Какое-то интересное название, заданное гениальнейшим администратором сего сайта и всея интернета.</div>
                    <div class="rowT-author">Admin</div>
                    <div class="rowT-editorBtn">
                        <div class="colGREEN"><a href="">Edit</a></div>
                        <div class="colRED"><a href="">Delete</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rowT-id">21</div>
                    <div class="rowT-title">Проход вергилия.</div>
                    <div class="rowT-author">Admin</div>
                    <div class="rowT-editorBtn">
                        <div class="colGREEN"><a href="">Edit</a></div>
                        <div class="colRED"><a href="">Delete</a></div>
                    </div>
                </div>
                <div class="row">
                    <div class="rowT-id">11</div>
                    <div class="rowT-title">Поступление сертификатов на прохождение санаторно-курортного лечения детей.</div>
                    <div class="rowT-author">Admin</div>
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
