<?php 
    include("../../path.php");
    include "../../app/controllers/results.php";
    $months = [
        'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
        'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь',
    ];
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ ДОСТИЖЕНИЯ - АНО "Подари завтра"</title>
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
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" value="<?=$id?>" name="id">
                        <div class="nTitle">
                            <label for="results-title">Название достижения:</label>
                            <input required type="text" value="<?=$title?>" name="results-title"  id="results-title" placeholder="Отредактируйте название достижения">
                        </div>
                        <div class="nShort-Content">
                            <label for="results-short-content">Короткое содержание новости\акции:</label>
                            <textarea placeholder="Добавьте короткое описание статьи..." name="results-short-content" id="results-short-content" cols="105" rows="5"><?=$short_content;?></textarea>
                        </div>
                        <div class="nContent">
                            <label for="results-content">Содержание достижения:</label>
                            <textarea name="results-content" id="editor"><?=$content;?></textarea>
                        </div>
                        <div class="nBottom">
                            <div class="nImg">
                                <?php if($img != 'foto-no.svg'): ?>
                                        <img src="<?php echo BASE_URL."assets/img/results/".$img?>" alt="nImg">
                                    <?php else: ?>
                                        <img src="<?php echo BASE_URL."assets/icons/foto-no.svg"?>" alt="nImg">
                                <?php endif; ?>
                            </div>
                            <div class="nCat">
                                <label for="nSel">Категория записи:</label>
                                <select id="nSel" name="results-categories">
                                <option selected value="<?=$id_temp['id'];?>"><?=$id_topicName?></option>
                                    <option disabled>-------------------------</option>
                                    <?php foreach ($topicsARR as $key => $topic): ?>
                                        <?php if($topic['superSection'] === "results"): ?>
                                            <option value="<?=$topic['id']?>"><?=$topic['name']?></option> 
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="public_date">
                            <label for="day">Дата опубликования новости:</label>
                                <!-- Выбор дня -->
                                <select id="day" name="public_date_day">
                                    <?php $date = date('d'); ?>
                                    <?php if (!empty($p_date)): ?>
                                        <option value="<?=$p_day?>" selected><?=$p_day?></option>
                                        <option disabled>-----</option>
                                    <?php endif; ?>
                                    <?php foreach (range(1, date('t')) as $val) { ?>
                                        <?php $day = sprintf('%02d', $val); ?>
                                        <option value="<?=$day?>"><?=$day?></option>
                                    <?php } ?>
                                </select>
                                <!-- Выбор месяца -->
                                <select id="month" name="public_date_month">
                                    <?php $date = date('m'); ?>
                                    <?php if (!empty($p_date)): ?>
                                        <option value="<?=$p_month?>" selected><?=$months[--$p_month];?></option>
                                        <option disabled>-----</option>
                                    <?php endif; ?>
                                    <?php foreach (range(1, 12) as $val) { ?>
                                        <?php $month = sprintf('%02d', $val); ?>
                                        <option value="<?=$month?>"><?= $months[--$val] ?></option>
                                    <?php } ?>
                                </select>

                                <!-- Выбор года -->
                                <select id="year" name="public_date_year">
                                    <?php $date = date('Y'); ?>
                                    <?php if (!empty($p_date)): ?>
                                        <option value="<?=$p_year?>" selected><?=$p_year?></option>
                                        <option disabled>-----</option>
                                    <?php endif; ?>
                                    <?php foreach (range(2022, 2030) as $val) { ?>
                                        <?php $selected = ($val == $date ? ' selected' : ''); ?>
                                        <option value="<?= $val ?>"<?= $selected ?>><?= $val ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> <!-- nBottom -->
                        <div class="nFile">
                            <input value="<?=$img?>" type="file" id="i-gFile" name="results-titleImgFile" accept=".png,.jpg,.jpeg,.svg,.bmp,.ico">
                            <input type="hidden" value="<?=$img?>" name="fileInDB">
                            <?php if($img === "foto-no.svg"): ?>
                                    <label for="i-gFile">В БД нет привязанного изображения. Используется "заглушка".</label>
                                <?php else: ?>
                                    <label for="i-gFile">Используется ранее загруженное изображение.</label>
                            <?php endif; ?>
                        </div>
                        <div class="err-msg">
                            <?php include "../../app/helps/errorInfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="results-editBtn">Сохранить запись</button>
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
