<?php 
    include("path.php");
    include "app/database/db.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ПРЕЙСКУРАНТ - АНО "Подари завтра"</title>
</head>
    <?php include("app/include/header.php"); ?>

    <section class="siteSection">
        <!-- Главное меню -->
        <nav class="mainMenu">
            <a href="<?php echo BASE_URL ?>">Главная</a>
            <a href="<?php echo BASE_URL .'aboutUs.php'?>">О нас</a>
            <a href="<?php echo BASE_URL .'newsPromos.php'?>">Новости и акции</a>
            <a href="#">Прейскурант</a>
            <a href="<?php echo BASE_URL .'ourServices.php'?>">Наши услуги</a>
            <a href="<?php echo BASE_URL .'ourCapabilities.php'?>">Наши возможности</a>
            <a href="<?php echo BASE_URL .'ourPlans.php'?>">Наши планы</a>
            <a href="<?php echo BASE_URL .'galery.php'?>">Галерея</a>
            <a href="<?php echo BASE_URL .'contacts.php'?>">Контакты</a>
        </nav>
        
        <?php include("app/include/asidePanel.php"); ?>

        <div class="siteContent__usefulLinks">
            <h5>Полезные ссылки</h5>

        </div>

        </div>
            <!-- Основной контент сайта -->
            <div class="siteContent__mainWrapper">
            <h2>Прейскурант услуг</h2>        
            ...        






                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>

    <?php include("app/include/footer.php"); ?>
</body>
</html>
