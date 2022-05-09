<!-- worked 02-05-22 -->
<?php 
    include "path.php";
    include "app/controllers/problems.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title><?=$ll['title'];?> - АНО "Подари завтра"</title>
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

            
            <h2><?=$ll['title'];?></h2>
            <div class="siteContent__line"></div>

                <div class="problems__descr">
                    <?=$lh['content'];?>
                </div>
                <div class="problems__text">Мы рекомендуем следующие подходы и терапии:</div>
                <?php foreach ($re as $key => $value): ?>
                    <div class="problems__link">
                        <a href="therapy.php?id=<?=$re[$key]['id'];?>"><?=$re[$key]['title'];?></a>
                    </div>
                <?php endforeach; ?>

                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>

    <?php include("app/include/footer.php"); ?>
</body>
</html>
