<?php 
    include "../../path.php";
    include "../../app/controllers/photoFiles.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ ФОТОГРАФИЯМИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__photoFiles">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="index.php">Управление фотографиями</a>
            </div>
            <h2>Управление фотографиями</h2>



            <div class="postsGrid">
                <form class="photoFiles-form" action="index.php" method="POST">
                    <label for="photoFiles-albums">Фотоальбом:</label>
                    <select onchange="if (this.selectedIndex) this.form.submit ()" id="photoFiles-albums" name="photoFiles-albums">
                        <option selected disabled value="<?=$id_albumSelId;?>"><?=$id_albumSel;?></option> 
                        <option disabled>-------------------------</option>
                        <option value="">Все</option> 
                        <?php foreach ($photoAlbumsARR as $key => $album): ?>
                            <option value="<?=$album['id_album']?>"><?=$album['title']?></option> 
                        <?php endforeach; ?>
                    </select>
                </form>

                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title" title="Файл фотографии"><b>Название фотографии</b></div>
                    <div class="rowT-descr"><b>Описание</b></div>
                    <div class="rowT-publishingStatus"><b>Статус</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>


                <!-- Выводим список статей -->
                <?php foreach ($filesPhotosARR as $key => $file): ?>
                    <div class="row">
                    <div class="rowT-id"><?=$file['id']?></div>
                        <div class="rowT-title">
                            <div class="nImg">
                                <?php if($file['img_name'] != 'foto-no.svg'): ?>
                                    <img src="<?php echo BASE_URL."assets/img/photoFiles/".$file['img_name'];?>" alt="nImg">
                                <?php else: ?>
                                    <img src="<?php echo BASE_URL."assets/icons/foto-no.svg";?>" title="Нет картинки. Нет привязанного фотоальбома." alt="Нет картинки">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="rowT-descr"><?=$file['description']?></div>
                        <div class="rowT-publishingStatus">
                            <?php
                                if ($file['published']) {
                                    echo "Опубликовано";
                                }else{
                                    echo "Не опубликовано";
                                }
                            ?>
                        </div>
                        <div class="rowT-editorBtn">
                            <div class="editIcons"><a href="edit.php?id=<?=$file['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                            <div class="editIcons"><a href="index.php?del_id=<?=$file['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                            <div class="editIcons"><a href="index.php?pub_id=<?=$file['id'];?>"><img title="Опубликовать\Снять с публикации" src="../../assets/icons/publish.svg"></a></div>
                        </div>
                    </div>
                <?php endforeach; ?>

                
            </div>
        </div>
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
