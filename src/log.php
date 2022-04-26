<?php
    include "path.php";
    include "app/controllers/users.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>Авторизация - АНО "Подари завтра"</title>
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
                <h3>Авторизация</h3>
                <form action="log.php" method="post" class="authForm">
                    <div>
                        <p>E-mail:</p>
                        <input class="authForm__input" value="<?=$email?>" name="auth_mail" type="email" id="authMail" placeholder="Введите адрес электронной почты">
                    </div>
                    <div>
                        <p>Пароль:</p>
                        <input class="authForm__input" value='' name="auth_pass" type="password" id="authPass" placeholder="Введите пароль">
                    </div>

                    <button class="authForm__button" type="submit" name="authForm__button">Войти</button>

                    <div class="authForm__msg">
                        <?=$errMsg?>
                    </div>

                </form>
            <div class="siteContent__line"></div>
        </div>
    </section>
    <?php include("app/include/footer.php"); ?>
</body>
</html>