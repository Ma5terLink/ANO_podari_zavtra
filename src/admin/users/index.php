<?php 
    include "../../path.php";
    include "../../app/controllers/users-sec.php";
    include "../../app/controllers/isModer.php"

?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>УПРАВЛЕНИЕ ПОЛЬЗОВАТЕЛЯМИ - АНО "Подари завтра"</title>
</head>
    <?php include "../../app/include/header-admin.php"; ?>

    <!-- Основной контент админки -->
    <div class="container">
    <?php include "../../app/include/sidebar-admin.php"; ?>
        <div class="admin__users">
            <!-- Кнопки управления -->
            <div class="buttonsPosts">
                <a href="create.php">Добавить</a>
                <a href="index.php">Управление пользователями</a>
            </div>
            <h2>Управление пользователями</h2>
            <div class="postsGrid">
                <div class="rowT">
                    <div class="rowT-id"><b>ID</b></div>
                    <div class="rowT-title"><b>Логин</b></div>
                    <div class="rowT-email"><b>E-mail</b></div>
                    <div class="rowT-role"><b>Роль</b></div>
                    <div class="rowT-comment"><b>Комменты</b></div>
                    <div class="rowT-ban"><b>Бан</b></div>
                    <div class="rowT-editorBtn"><b>Редактирование</b></div>
                </div>
                <?php foreach ($usersARR as $key => $users): ?>
                    <div class="row">
                        <div class="rowT-id"><?=$users['id'];?></div>
                            <div class="rowT-title"><?=$users['username'];?></div>
                            <div class="rowT-email"><?=$users['email'];?></div>
                            <div class="rowT-role">
                                <?php
                                    if ($users['admin']) {
                                        echo "<b>Администратор</b>";
                                    }elseif($users['moderator']) {
                                        echo "<b>Модератор</b>";
                                    }else{
                                        echo "Пользователь";
                                    }
                                ?>
                            </div>
                            <div class="rowT-comment"><?=$users['comment']?></div>
                            <div class="rowT-ban">
                                <?php if($users['banned']): ?>
                                    <a href="edit.php?ban_id=<?=$users['id'];?>"><img title="Забанен" src="<?=BASE_URL."assets/icons/banned-2.svg";?>" alt=""></a>
                                <?php else: ?>
                                    <a href="edit.php?ban_id=<?=$users['id'];?>"><img src="<?=BASE_URL."assets/icons/notbanned.svg";?>" alt=""></a>
                                <?php endif; ?>
                            </div>
                            <div class="rowT-editorBtn">
                                <div class="editIcons"><a href="edit.php?id=<?=$users['id'];?>"><img title="Редактировать" src="../../assets/icons/edit-3.svg"></a></div>
                                <div class="editIcons"><a href="edit.php?del_id=<?=$users['id'];?>"><img title="Удалить" src="../../assets/icons/delete-2.svg"></a></div>
                            </div>
                        </div>
                <?php endforeach; ?>
                    </div>
        </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
