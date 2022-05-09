<?php 
    include "../../path.php";
    include "../../app/controllers/users-sec.php";
    include "../../app/controllers/isModer.php"
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ДОБАВЛЕНИЕ НОВОГО ПОЛЬЗОВАТЕЛЯ - АНО "Подари завтра"</title>
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
            <h2>Создание нового пользователя</h2>
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="create.php" method="post">
                        <div class="nTitle">
                            <label for="users-login"><b>Логин пользователя:</b></label>
                            <input required type="text" value="<?=$login?>" name="reg_login" id="users-login" placeholder="Введите логин пользователя">

                            <label for="users-email"><b>E-mail пользователя:</b></label>
                            <input required type="email" value="<?=$email?>" name="reg_email" id="users-email" placeholder="Введите электронную почту пользователя">

                            <label for="users-passF"><b>Пароль пользователя:</b></label>
                            <input required type="password" name="reg_passF" id="users-passF" placeholder="Введите пароль пользователя">

                            <label for="users-passS"><b>Повторите пароль пользователя:</b></label>
                            <input required type="password" name="reg_passS" id="users-passS" placeholder="Повторите пароль пользователя">
                        </div>
                        <div class="nCat">
                            <label for="nSel">Роль:</label>
                            <select id="nSel" name="reg_users_categories">
                                <option value="user">Пользователь</option>
                                <option value="moder">Модератор</option>
                                <option value="admin">Администратор</option>
                            </select>
                        </div>

                        <div class="err-msg">
                            <?php include "../../app/helps/errorInfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="registerForm__button">Создать</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
