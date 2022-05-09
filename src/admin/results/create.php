<?php 
    include("../../path.php");
    include "../../app/controllers/results.php";
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
                <a href="create.php">Добавить достижение</a>
                <a href="index.php">Управление постами достижений</a>
            </div>
            <h2>Добавление достижения</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post" enctype="multipart/form-data">
                        <div class="nTitle">
                            <label for="results-title">Название достижения:</label>
                            <input required type="text" value="<?=$title?>" name="results-title" id="results-title" placeholder="Введите название новости\акции (не менее 7 символов)">
                        </div>
                        <div class="nShort-Content">
                            <label for="results-short-content">Короткое содержание новости\акции:</label>
                            <textarea placeholder="Добавьте короткое описание статьи..." name="results-short-content" id="results-short-content" cols="105" rows="5"><?=$short_content;?></textarea>
                        </div>
                        <div class="nContent">
                            <label for="editor">Содержание достижения:</label>
                            <textarea placeholder="Добавьте содержание статьи..." name="results-content" id="editor"><?=$content?></textarea>
                        </div>
                        <div class="nBottom">
                            <div>
                                <div class="nImg">
                                    <img src="<?php echo BASE_URL."assets/icons/foto-no.svg"?>" alt="nImg">
                                </div>
                            </div>
                            <div class="nCat">
                                <label for="nSel">Категория записи:</label>
                                <select id="nSel" name="results-categories">
                                <?php foreach ($topicsARR as $key => $topic): ?>
                                    <?php if($topic['superSection'] === "results"): ?>
                                        <option value="<?=$topic['id']?>"><?=$topic['name']?></option> 
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="nFile">
                            <input type="file" id="i-gFile" name="results-titleImgFile" accept=".png,.jpg,.jpeg,.svg,.bmp,.ico">
                            <label for="i-gFile"></label>
                        </div>
                        <div class="err-msg">
                            <?php include "../../app/helps/errorInfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="results-saveBtn">Сохранить запись</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
    <!-- <script src="//cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script> -->
    <script src="../../assets/js/ckeditor.js"></script>
    <script src="../../assets/js/scripts.js"></script>
</body>
</html>
