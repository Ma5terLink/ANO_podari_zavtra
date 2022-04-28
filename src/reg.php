<?php
    include "path.php";
    include "app/controllers/users.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>РЕГИСТРАЦИЯ - АНО "Подари завтра"</title>
</head>
    <?php include("app/include/header.php"); ?>

    <section class="siteSection">
        <!-- Главное меню -->
        <nav class="mainMenu">
            <a href="<?php echo BASE_URL ?>">Главная</a>
            <a href="<?php echo BASE_URL .'aboutUs.php'?>">О нас</a>
            <a href="<?php echo BASE_URL .'newsPromos.php'?>">Новости и акции</a>
            <a href="<?php echo BASE_URL .'pricelist.php'?>">Прейскурант</a>
            <a href="<?php echo BASE_URL .'ourServices.php'?>">Наши услуги</a>
            <a href="<?php echo BASE_URL .'ourCapabilities.php'?>">Наши возможности</a>
            <a href="<?php echo BASE_URL .'ourPlans.php'?>">Наши планы</a>
            <a href="<?php echo BASE_URL .'galery.php'?>">Галерея</a>
            <a href="<?php echo BASE_URL .'contacts.php'?>">Контакты</a>
        </nav>
        <div style="padding-left: 0px;" class="siteContent__mainWrapper">
            <div class="siteContent__line"></div>
                <h3>Регистрация нового пользователя</h3>

                <form action="reg.php" method="post" class="registerForm">
                    <input type="hidden" value="user" name="users-categories">
                    <div>
                        <p>Логин:</p>
                        <input class="registerForm__input" value="<?=$login?>" name="reg_login" type="text" id="loginInput" placeholder="Введите желаемый логин">
                    </div>
                    <div>
                        <p>E-mail:</p>
                        <input class="registerForm__input" value="<?=$email?>" name="reg_email" type="email" id="emailInput" placeholder="Введите адрес электронной почты">
                    </div>
                    <div>
                        <p>Пароль:</p>
                        <input class="registerForm__input" value='' name="reg_passF" type="password" id="passFInput" placeholder="Введите пароль">
                    </div>
                    <div>
                        <p>Пароль (повторно):</p>
                        <input class="registerForm__input" value='' name="reg_passS" type="password" id="passSInput" placeholder="Повторите пароль">
                    </div>

                    <button class="registerForm__button" type="submit" name="registerForm__button">Регистрация</button>

                    <div class="registerForm__msg">
                        <?=$errMsg?>
                    </div>

                </form>
            <div class="siteContent__line"></div>
        </div>
    </section>
    <?php include("app/include/footer.php"); ?>
</body>
</html>