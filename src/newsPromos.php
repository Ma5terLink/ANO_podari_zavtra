<?php 
    include "path.php";
    include "app/database/db.php";
    include "app/controllers/topics.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>НОВОСТИ И АКЦИИ - АНО "Подари завтра"</title>
</head>
    <?php include("app/include/header.php"); ?>

    <section class="siteSection">
    <?php include("app/include/main-menu.php");
          include("app/include/asidePanel.php"); ?>

        <div class="news__categories-list">
        <h4>категории</h4>
            <ul>
                <?php foreach ($topicsARR as $key => $topic): ?>
                    <?php if($topic['superSection'] === "news"): ?>
                        <li>
                            <a href="#"><?= $topic['name']; ?></a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>

            <div class="siteContent__usefulLinks">
                <h5>Полезные ссылки</h5>

            </div>

            </div>
            <!-- Основной контент сайта -->
            <div class="siteContent__mainWrapper">
                <div class="siteContent__newsPromos-wrapper">
                    <h2>Новости и акции</h2>
                    <div class="siteContent__line"></div>
                    <div class="siteContent__resultsWrapper-links">
                        Всего записей: 3, на странице: 1 - 3<br>
                        Начало | Пред. | <span>1</span> | След. | Конец
                    </div>
                    <div class="siteContent__newsPromos-item">
                        <a href="#">
                            <img src="<?php echo BASE_URL ?>assets/img/news/n1.jpg" alt="крайняя новость">
                        </a>
                        <i>29.08.2021</i>
                        <i class="title">Мы работаем с сертификатами на реабилитацию детей-инвалидов‼</i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. rem deleniti numquam perferendis dolorum nisi. Aliquam quam modi dolores veniam, hic saepe blanditiis earum libero nihil eveniet voluptas maiores doloremque incidunt totam molestiae unde iusto in, ullam harum deserunt. Beatae quibusdam possimus rem, rerum tenetur blanditiis mollitia reprehenderit deserunt ut, voluptate at molestiae. Quia ab totam eligendi eius libero incidunt animi, atque laborum consequuntur saepe repudiandae aperiam quam! Aliquam illum obcaecati earum. Unde earum illum reprehenderit dolorum quisquam!</p>
                    </div>
                    <div class="siteContent__newsPromos-item">
                        <a href="#">
                            <img src="<?php echo BASE_URL ?>assets/img/news/n2.jpg" alt="крайняя новость">
                        </a>
                        <i>10.08.2021</i>
                        <i class="title">МСЭ</i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta itaque vero, omnis doloribus nostrum, beatae amet repellendus aliquam dicta mollitia incidunt! Perspiciatis animi reiciendis vero doloribus saepe, atque totam doloremque consectetur, ducimus quos consequatur, facilis dicta facere ipsam! Saepe eveniet, laborum consequuntur saepe repudiandae aperiam quam! Aliquam illum obcaecati earum. Unde earum illum reprehenderit dolorum quisquam!</p>
                    </div>
                    <div class="siteContent__newsPromos-item">
                        <a href="#">
                            <img src="<?php echo BASE_URL ?>assets/img/news/n3.jpg" alt="крайняя новость">
                        </a>
                        <i>09.06.2021</i>
                        <i class="title">Сертификаты на реабилитацию детей-инвалидов</i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta itaque vero, omnis doloribus nostrum. Hic sapiente modi doloribus fugit rem deleniti numquam perferendis dolorum nisi. Aliquam quam modi dolores veniam, hic saepe blanditiis earum libero nihil eveniet voluptas maiores doloremque incidunt totam molestiae unde iusto in, ullam harum deserunt. Beatae quibusdam possimus rem, rerum tenetur blanditiis mollitia reprehenderit deserunt ut, voluptate at molestiae. Quia ab totam eligendi eius libero incidunt animi, atque laborum consequuntur saepe repudiandae aperiam quam! Aliquam illum obcaecati earum. Unde earum illum reprehenderit dolorum quisquam!</p>
                    </div>
                    <div class="siteContent__resultsWrapper-links">
                        Всего записей: 3, на странице: 1 - 3<br>
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
