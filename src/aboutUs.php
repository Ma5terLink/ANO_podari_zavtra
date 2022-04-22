<?php include("path.php"); ?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>О НАС - АНО "Подари завтра"</title>
</head>
    <?php include("app/include/header.php"); ?>

    <section class="siteSection">
        <!-- Главное меню -->
        <nav class="mainMenu">
            <a href="<?php echo BASE_URL ?>">Главная</a>
            <a href="#">О нас</a>
            <a href="<?php echo BASE_URL .'newsPromos.php'?>">Новости и акции</a>
            <a href="<?php echo BASE_URL .'pricelist.php'?>">Прейскурант</a>
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
                <div class="siteContent__aboutWrapper">
                    <h2>О нас</h2>
                    <p class="colors upper">ДОБРО ПОЖАЛОВАТЬ В Реабилитационный центр "Подари завтра"</p>
                    <img src="<?php echo BASE_URL ?>assets/img/personal/pers-1.webp" alt="Директор: Файзуллина И.С." title="Директор: Файзуллина И.С.">
                    <p class="colors">Основатель и директор АНО "Подари завтра" Файзуллина Ирина Сергеевна</p>

                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti aspernatur distinctio nobis error facilis id ducimus non modi tempora quia et quos vel illo veritatis dignissimos, consectetur ex inventore corrupti?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut sapiente dolorum iste? Necessitatibus natus dicta quidem sed corrupti provident magnam voluptatum voluptatibus fugit, animi facere omnis placeat tempore consequuntur repudiandae quia dolores suscipit officia. Quos voluptate totam repellendus itaque quibusdam molestiae, id enim, delectus exercitationem ab nisi quaerat culpa excepturi eum iste incidunt autem doloribus eligendi et perspiciatis reprehenderit perferendis deserunt neque. Possimus dolorum excepturi veritatis, sunt deleniti quas similique molestiae, vero hic deserunt doloribus iure iste earum itaque.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti quia et quos vel illo veritatis dignissimos, consectetur ex inventore corrupti?</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti d ducimus non modi tempora aspernatur distinctio nobis error facilis id ducimus non modi tempora quia et quos vel illo veritatis dignissimos, consectetur ex inventore corrupti?</p>
                    <br>
                    <p>E-mail: <a href="mailto:test1@ya.ru">test1@ya.ru</a></p>




                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>


    <?php include("app/include/footer.php"); ?>
</body>
</html>
