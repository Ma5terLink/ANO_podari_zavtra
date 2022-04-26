<?php 
    include("path.php");
    include "app/database/db.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ВСЕ РЕЗУЛЬТАТЫ - АНО "Подари завтра"</title>
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
        
        <?php include("app/include/asidePanel.php"); ?>

        <div class="siteContent__usefulLinks">
            <h5>Полезные ссылки</h5>

        </div>

        </div>
            <!-- Основной контент сайта -->
            <div class="siteContent__mainWrapper">
                <div class="siteContent__resultsWrapper">
                    <h2>наши достижения и результаты</h2>

                    <div class="siteContent__resultsWrapper-links">
                        Всего записей: 2, на странице: 1 - 2<br>
                        Начало | Пред. | <span>1</span> | След. | Конец
                    </div>

                    <div class="siteContent__resultsWrapper-item">
                        <a href="#">
                            <img src="<?php echo BASE_URL ?>assets/img/news/dd1.jpg" alt="крайняя новость">
                        </a>
                        <i>29.08.2021</i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta itaque vero, omnis doloribus nostrum, beatae amet repellendus aliquam dicta mollitia incidunt! Perspiciatis animi reiciendis vero doloribus saepe, atque totam doloremque consectetur, ducimus quos consequatur, facilis dicta facere ipsam! Saepe eveniet, enim dicta quaerat distinctio ullam incidunt sunt quae accusamus sapiente quam sequi laboriosam quis nesciunt excepturi iste quisquam aliquid vitae eos quos, maiores esse obcaecati consequuntur. Hic sapiente modi doloribus fugit rem deleniti numquam perferendis dolorum nisi. Aliquam quam modi dolores veniam, hic saepe blanditiis earum libero nihil eveniet voluptas maiores doloremque incidunt totam molestiae unde iusto in, ullam harum deserunt. Beatae quibusdam possimus rem, rerum tenetur blanditiis mollitia reprehenderit deserunt ut, voluptate at molestiae. Quia ab totam eligendi eius libero incidunt animi, atque laborum consequuntur saepe repudiandae aperiam quam! Aliquam illum obcaecati earum. Unde earum illum reprehenderit dolorum quisquam!</p>
                    </div>


                    <div class="siteContent__resultsWrapper-item">
                        <a href="#">
                            <img src="<?php echo BASE_URL ?>assets/img/news/dd2.jpg" alt="крайняя новость">
                        </a>
                        <i>15.08.2021</i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque perspiciatis, quis ad quo temporibus laborum, eius totam impedit veritatis a hic atque sed magnam adipisci esse magni maxime, recusandae quam suscipit repellendus ipsam ipsa fugiat. Quasi accusantium aliquid, recusandae distinctio beatae assumenda alias nihil eum modi atque eaque dicta libero accusamus molestias consectetur nam similique. Animi necessitatibus incidunt magni velit voluptates a inventore vero. Libero reiciendis dolorum quasi possimus ducimus!</p>
                    </div>

                    <div class="siteContent__resultsWrapper-links">
                        Всего записей: 2, на странице: 1 - 2<br>
                        Начало | Пред. | <span>1</span> | След. | Конец
                    </div>

                </div>



                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>

    <?php include("app/include/footer.php"); ?>
</body>
</html>
