<?php 
    include("path.php");
    include "app/database/db.php";
    include "app/controllers/topics.php";
    include "app/controllers/resultsMain.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>ВСЕ РЕЗУЛЬТАТЫ - АНО "Подари завтра"</title>
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
                <div class="siteContent__resultsWrapper">
                    <h2>наши достижения и результаты</h2>
                    <div class="siteContent__line"></div>

                    <?php include "app/include/resultsSwitcher.php"; ?>


                    <?php for($i = $numsResultsOnPageFirst-1; $i <= $numsResultsOnPageSec-1; $i++): ?>
                        <div class="siteContent__resultsWrapper-item">
                            <div>
                                <a href="<?php echo BASE_URL ."resultSingle.php?id=".$allPublishedResults[$i]['id'];?>">
                                    <?php if($allPublishedResults[$i]['img'] === "foto-no.svg"): ?>
                                            <img src="<?php echo BASE_URL ."assets/icons/foto-no.svg";?>" alt="<?=$allPublishedResults[$i]['title']?>">
                                    <?php else: ?>
                                            <img src="<?php echo BASE_URL ."assets/img/results/".$allPublishedResults[$i]['img'];?>" alt="<?=$allPublishedNews[$i]['title']?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="gridPost">
                                <i><?=substr($allPublishedResults[$i]['published_date'],8,2)?>-<?=substr($allPublishedResults[$i]['published_date'],5,2)?>-<?=substr($allPublishedResults[$i]['published_date'],0,4)?></i>

                                <i class="title" title="<?=$allPublishedResults[$i]['title'];?>">
                                    <?php if(mb_strlen($allPublishedResults[$i]['title']) < 50) {
                                        echo $allPublishedResults[$i]['title'];
                                    }else{
                                        echo mb_substr($allPublishedResults[$i]['title'],0,50)."...";
                                    } ?>
                                </i>

                                <i>
                                    в категории:<br>
                                    <?php
                                        $id_topic = ['id' => $allPublishedResults[$i]['id_topic']];
                                        $name_topic = selectOne('topics', $id_topic);
                                        echo "<b>". $name_topic['name'] ."</b>";
                                    ?>
                                </i>
                                
                                <p class="horizontal"><?=$allPublishedResults[$i]['short_content']?></p>
                            </div>
                        </div>
                    <?php endfor; ?>



                    <?php include "app/include/resultsSwitcher.php"; ?>

                </div>



                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>

    <?php include("app/include/footer.php"); ?>
</body>
</html>
