<?php 
    include "../../path.php";
    include "../../app/controllers/users-sec.php";
    include "../../app/controllers/isModer.php"
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЯ - АНО "Подари завтра"</title>
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
            <h2>Редактирование пользователя</h2>
            <!-- <div class="colorRED">Внимание, пароль может меняеться принудительно (без подтверждения)!!!</div> -->
            <div class="postsGrid">
                <div class="newsGrid__column">
                    <form action="edit.php" method="post">
                        <input type="hidden" value="<?=$id?>" name="id"> <!--dgdg-->
                        <div class="nTitle">
                            <label for="reg_login"><b>Логин пользователя:<span>*</span></b></label>
                            <input required type="text" value="<?=$login?>" name="reg_login" id="users-login" placeholder="Введите логин пользователя">

                            <label for="reg_email"><b>E-mail пользователя (<span><i>не подлежит изменению</i></span>):</b></label>
                            <input readonly type="email" value="<?=$email?>" name="reg_email" id="users-email" placeholder="Введите электронную почту пользователя">

                            <label for="reg_comment"><b>Комментарии о пользователе (<span><i>видно только админам</i></span>):</b></label>
                            <textarea name="reg_comment" id="reg_comment" cols="105" rows="5" placeholder="Здесь можно оставить, своего рода, заметку о пользователе. В выражениях можно не стесняться))..."><?=$comment;?></textarea>
                        </div>
                        <div class="nCat">
                            <label for="reg_ban"><b>Бан пользователя:</b></label>
                            <select name="reg_ban" id="reg_ban">
                                <option selected value="<?=$users['banned'];?>"><?=$banned;?></option>
                                <option disabled>-------------------------</option>
                                <option value="0">Не забанен</option>
                                <option value="1">Забанен</option>
                            </select>
                            <label for="nSel">Роль:</label>
                            <select id="nSel" name="reg_users_categories">
                                <option selected value="<?=$vrole;?>"><?=$role;?></option>
                                <option disabled>-------------------------</option>
                                <option value="user">Пользователь</option>
                                <option value="moder">Модератор</option>
                                <option value="admin">Администратор</option>
                            </select>
                        </div>
                        <div class="err-msg">
                            <?php include "../../app/helps/errorInfo.php";?>
                        </div>
                        <button class="admin_Btn" type="submit" name="editRegisterForm__button">Сохранить изменения</button>
                    </form>

                </div>
            </div>
        </div>  
    </div>

    <?php include("../../app/include/footer.php"); ?>
</body>
</html>
