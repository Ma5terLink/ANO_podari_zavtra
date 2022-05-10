<?php 
    include "path.php";
    include "app/database/db.php";
    include "app/controllers/topics.php";
    include "app/controllers/newsPromos.php";

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

        <div class="siteContent__usefulLinks">
            <h5>Полезные ссылки</h5>

        </div>
    <!-- следующий /div относится к asidePanel -->
    </div>
     
        <!-- Основной контент сайта -->
        <div class="siteContent__mainWrapper">
            <div class="siteContent__newsPromos-wrapper">
                <h2>Новости и акции</h2>

                <div class="siteContent__line"></div>


                <?php include "app/include/newsSwitcher.php"; ?>


                <?php for($i = $numsNewsOnPageFirst-1; $i <= $numsNewsOnPageSec-1; $i++): ?>
                    <div class="siteContent__newsPromos-item">
                        <div>
                            <a href="<?php echo BASE_URL ."Single.php?nPost=".$allPublishedNews[$i]['id'];?>">
                                <?php if($allPublishedNews[$i]['img'] === "foto-no.svg"): ?>
                                        <img src="<?php echo BASE_URL ."assets/icons/foto-no.svg";?>" alt="<?=$allPublishedNews[$i]['title']?>">
                                <?php else: ?>
                                        <img src="<?php echo BASE_URL ."assets/img/news/".$allPublishedNews[$i]['img'];?>" alt="<?=$allPublishedNews[$i]['title']?>">
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="gridPost">
                            <i><?=substr($allPublishedNews[$i]['published_date'],8,2)?>-<?=substr($allPublishedNews[$i]['published_date'],5,2)?>-<?=substr($allPublishedNews[$i]['published_date'],0,4)?></i>


                            <i class="title" title="<?=$allPublishedNews[$i]['title'];?>">
                                <?php if(mb_strlen($allPublishedNews[$i]['title']) < 65) {
                                    echo $allPublishedNews[$i]['title'];
                                }else{
                                    echo mb_substr($allPublishedNews[$i]['title'],0,65)."...";
                                } ?>
                            </i>


                            <i>
                                в категории:<br>
                                <?php
                                    $id_topic = ['id' => $allPublishedNews[$i]['id_topic']];
                                    $name_topic = selectOne('topics', $id_topic);
                                    echo "<b>". $name_topic['name'] ."</b>";
                                ?>
                            </i>
                            <p class="horizontal"><?=$allPublishedNews[$i]['short_content']?></p>
                        </div>
                    </div>
                <?php endfor; ?>
                
                <?php include "app/include/newsSwitcher.php"; ?>

            </div>

            <!-- Блок ссылок на болезни -->
            <?php include("app/include/healthLinks.php"); ?>
        </div>
    </div>
</section>

    <?php include("app/include/footer.php"); ?>
</body>
</html>
