<?php 
    include("../../path.php");
    include "../../app/controllers/news.php";

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
                <a href="create.php">Добавить новость</a>
                <a href="index.php">Управление постами</a>
            </div>
            <h2>Добавление новости</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="400000">
                        <div class="nTitle">
                            <label for="news-title">Название новости\акции:</label>
                            <input required value="<?=$title;?>" type="text" name="news-title" id="news-title" placeholder="Введите название новости\акции (не менее 7 символов)">
                        </div>
                        <div class="nShort-Content">
                            <label for="news-short-content">Короткое содержание новости\акции:</label>
                            <textarea placeholder="Добавьте короткое описание статьи..." name="news-short-content" id="news-short-content" cols="105" rows="5"><?=$short_content;?></textarea>
                        </div>
                        <div class="nContent">
                            <label for="news-content">Содержание новости\акции:</label>
                            <textarea placeholder="Добавьте содержание статьи..." name="news-content" id="editor""><?=$content;?></textarea>
                        </div>
                        <div class="nBottom">
                            <div>
                                <div class="nImg">
                                    <img src="<?php echo BASE_URL."assets/icons/foto-no.svg"?>" alt="nImg">
                                </div>
                            </div>
                            <div class="nCat">
                                <label for="nSel">Категория записи:</label>
                                <select id="nSel" name="news-categories">
                                    <?php foreach ($topicsARR as $key => $topic): ?>
                                        <?php if($topic['superSection'] === "news"): ?>
                                            <option value="<?=$topic['id']?>"><?=$topic['name']?></option> 
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            
                        </div>

                        <div class="nFile">
                            <input type="file" id="i-gFile" name="news-titleImgFile" accept=".png,.jpg,.jpeg,.svg,.bmp,.ico">
                            <label for="i-gFile"></label>
                        </div>
                        <div class="err-msg">
                            <?php include "../../app/helps/errorinfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="news-saveBtn">Сохранить запись</button>
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
