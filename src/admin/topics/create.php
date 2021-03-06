<?php 
    include "../../path.php";
    include "../../app/controllers/topics.php";
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
                <a href="create.php">Создать категорию</a>
                <a href="index.php">Управление категориями</a>
            </div>
            <h2>Создание категории</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <!-- Форма -->
                    <form action="create.php" method="post" accept-charset="UTF-8">
                        <div class="nTitle">
                            <label for="topics-name">Название категории:</label>
                            <input required type="text" value="<?=$name;?>" name="topics-name" id="topics-name" placeholder="Введите название категории">
                        </div>
                        <div class="nContent">
                            <label for="topics-description">Описание категории:</label>
                            <textarea name="topics-description" id="topics-description" cols="105" rows="5" placeholder="Описание категории (не обязательно)..."><?=$description;?></textarea>
                        </div>
                        Пометить для раздела:
                        <select name="topics-section" value="<?= $superSection; ?>" id="topics-section">
                            <option value="news">Новости и акции</option>
                            <option value="results">Достижения</option>
                        </select>
                        <button class="admin_Btn" type="submit" name="topics-create">Создать категорию</button>
                        <div class="err-msg"><?=$errMsg?><p><?=$okMsg?></p></div>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    </script>
</body>
</html>
