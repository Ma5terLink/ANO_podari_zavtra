<?php 
    session_start();
    include("../../path.php");
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ ДОСТИЖЕНИЯ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__results">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="#">Добавить достижение</a>
                <a href="index.php">Управление постами достижений</a>
            </div>
            <h2>Добавление достижения</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post">
                        <div class="nTitle">
                            <label for="results-title">Название достижения:</label>
                            <input required type="text" name="results-title" id="results-title" placeholder="Введите название достижения">
                        </div>
                        <div class="nContent">
                            <label for="editor1">Содержание достижения:</label>
                            <textarea name="results-content" id="editor1" cols="105" rows="5"></textarea>
                        </div>
                        <div class="nBottom">
                            <div>
                                <div class="nImg">
                                    <img src="https://mirpozitiva.ru/wp-content/uploads/2019/11/1477469601_nature_gora.jpg" alt="nImg">
                                </div>
                                <div class="nFile">
                                    <input type="file" id="i-gFile" name="results-titleImgFile">
                                    <label for="i-gFile"></label>
                                </div>
                            </div>
                            <div class="nCat">
                                <label for="nSel">Категория записи:</label>
                                <select id="nSel" name="results-categories">
                                    <option selected value="result">Достижение</option>
                                </select>
                            </div>
                        </div>
                        <button class="admin_Btn" type="submit" name="results-saveBtn">Сохранить запись</button>
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
