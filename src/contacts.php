<?php 
    include("path.php");
    include "app/database/db.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>КОНТАКТЫ - АНО "Подари завтра"</title>
</head>
    <?php include("app/include/header.php"); ?>

    <section class="siteSection">
    <?php include("app/include/main-menu.php");
          include("app/include/asidePanel.php"); ?>

        <div class="siteContent__usefulLinks">
            <h5>Полезные ссылки</h5>

        </div>

            </div>
            <!-- Основной контент сайта -->
            <div class="siteContent__mainWrapper">
                <h2>контакты</h2>
                <div class="siteContent__line"></div>
                <div class="siteContent__contacts-wrapper">
                    <h4>Автономная некоммерческая организация содействия реабилитации лиц с ограниченными возможностями здоровья "Подари завтра"</h4>
                    <p>453214, Республика Башкортостан, г.Ишимбай, ул. Ленина, 56</p>
                    <p>Режим работы: ПН-ПТ, с 10:00 - 20:00 (без перерыва)</p>
                    <p class="spec">Директор: Файзуллина Ирина Сергеевна</p>
                </div>
     
                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>


    <?php include("app/include/footer.php"); ?>
</body>
</html>
