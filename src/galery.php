<?php 
    include "path.php";
    include "app/database/db.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ГАЛЕРЕЯ - АНО "Подари завтра"</title>
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
            <h2>фотогалерея</h2>
            <div class="siteContent__line"></div>
            <div class="gallery__album">
                <div class="gallery__album-title">
                    Альбом: Поездка в Кукшакуль 
                    <span>
                    (фото: 34шт.)
                    </span>
                </div>
                <div class="gallery__album-wrapper">
                    <div class="gallery__album-item">
                        <a href="">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                        <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>

                    
                    
                    <div class="gallery__album-item">
                        <a href="">
                            <img src="assets/img/slider/slide-3.jpg" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                        <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                            <img src="assets/img/slider/slide-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                        <img src="assets/img/slider/slide-2.jpg" alt="">
                        </a>
                    </div><div class="gallery__album-item">
                        <a href="">
                            <img src="assets/img/slider/slide-001.jpg" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                        <img src="assets/img/logo.png" alt="">
                        </a>
                    </div><div class="gallery__album-item">
                        <a href="">
                            <img src="assets/img/logo.png" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                        <img src="assets/img/slider/slide-4.jpg" alt="">
                        </a>
                    </div>


                    <div class="gallery__album-item">
                        <a href="">
                            <img src="" alt="">
                        </a>
                    </div>
                    <div class="gallery__album-item">
                        <a href="">
                            <img src="" alt="">
                        </a>
                    </div>
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
