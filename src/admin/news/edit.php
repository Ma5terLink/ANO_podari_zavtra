<?php 
    include("../../path.php");
    include "../../app/controllers/news.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ НОВОСТИ - АНО "Подари завтра"</title>
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
            <h2>Редактирование новости</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="edit.php" method="post" accept-charset="UTF-8">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <div class="nTitle">
                            <label for="news-title">Название новости\акции:</label>
                            <input required value="<?=$title;?>" type="text" name="news-title" id="news-title" placeholder="Отредактируйте название новости\акции">
                        </div>
                        <div class="nContent">
                            <label for="news-content">Содержание новости\акции:</label>
                            <textarea name="news-content" id="editor"><?=$content;?></textarea>
                        </div>
                        <div class="nBottom">
                            <div>
                                <div class="nImg">
                                    <img src="<?php echo BASE_URL."assets/icons/foto-no.svg"?>" alt="nImg">
                                </div>
                                <div class="nFile">
                                    <input value="<?=$img?>" type="file" id="i-gFile" name="news-titleImgFile"">
                                    <input type="hidden" value="<?=$img?>" name="fileInDB">
                                    <label for="i-gFile"><?=$img?></label>
                                </div>
                            </div>
                            <div class="nCat">
                                <label for="nSel">Категория записи:</label>
                                <select id="nSel" name="news-categories">
                                    <option selected value="<?=$id_temp['id'];?>"><?=$id_topicName?></option>
                                    <option disabled>-------------------------</option>
                                    <?php foreach ($topicsARR as $key => $topic): ?>
                                        <?php if($topic['superSection'] === "news"): ?>
                                            <option value="<?=$topic['id']?>"><?=$topic['name']?></option> 
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                       
                        <div class="err-msg"><?=$errMsg?></div>
                        <button class="admin_Btn" type="submit" name="news-editBtn">Сохранить запись</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    <!-- <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script src="../../assets/js/scripts.js"></script> -->
    <script src="../../assets/js/ckeditor.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>
