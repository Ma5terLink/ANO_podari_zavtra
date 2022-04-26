<?php 
    session_start();
    include("../../path.php");
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ НОВОСТИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__news">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="#">Добавить новость</a>
                <a href="index.php">Управление постами</a>
            </div>
            <h2>Добавление новости</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post">
                        <div class="nTitle">
                            <label for="news-title">Название новости\акции:</label>
                            <input required type="text" name="news-title" id="news-title" placeholder="Введите название новости\акции">
                        </div>
                        <div class="nContent">
                            <label for="editor1">Содержание новости\акции:</label>
                            <textarea name="news-content" id="editor1" cols="105" rows="5"></textarea>
                        </div>
                        <div class="nBottom">
                            <div>
                                <div class="nImg">
                                    <img src="https://mirpozitiva.ru/wp-content/uploads/2019/11/1477469601_nature_gora.jpg" alt="nImg">
                                </div>
                                <div class="nFile">
                                    <input type="file" id="i-gFile" name="news-titleImgFile">
                                    <label for="i-gFile"></label>
                                </div>
                            </div>
                            <div class="nCat">
                                <label for="nSel">Категория записи:</label>
                                <select id="nSel" name="news-categories">
                                    <option selected value="news">Новость</option>
                                    <option value="promotion">Акция</option>
                                </select>
                            </div>
                        </div>
                        <button class="admin_Btn" type="submit" name="news-saveBtn">Сохранить запись</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>
