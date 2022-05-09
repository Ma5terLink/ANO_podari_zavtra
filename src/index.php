<?php
    include "path.php";
    include "app/database/db.php";
    include "app/controllers/getPublishedARR.php";
?>

<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <title>Автономная некоммерческая организация содействия реабилитации лиц с ограниченными возможностями здоровья "Подари завтра"</title>
</head>
    <?php include("app/include/header.php"); ?>

    <section class="slider">
        <div class="container">
            <div id="wrapper">
                <div id="container">
                    <div class="sliderbutton" id="slideleft" onclick="slideshow.move(-1)"></div>
                    <div id="slider">
                        <ul>
                            <li>
                                <h3 class="title">
                                    <span>Матвеев Семён</span>, 8 лет<br>
                                    ДЦП</h3>
                                <img src="<?php echo BASE_URL ?>assets/img/slider/slide-001.jpg" width="1170" height="400" alt="MatveevS" />
                                <!-- <div class="text">
                                    <span>Место рождения:</span> г. Набережные челны<br>
                                    <span>Цель сбора:</span> Операция на спинном мозге СДР в клинике Children's StLouise США<br>
                                    <span>Срок сбора:</span> Экстренно<br>
                                </div> -->
                            </li>
                            <li>
                                <h3 class="title">
                                    <span>Матиенко Паисий</span>, 4 года<br>
                                    ДЦП</h3>
                                <img src="<?php echo BASE_URL ?>assets/img/slider/slide-002.jpg" width="1170" height="400" alt="MatienkoP" />
                                <!-- <div class="text">
                                    <span>Место рождения:</span> г.Стерлитамак<br>
                                    <span>Цель сбора:</span> Реабилитация<br>
                                    <span>Срок сбора:</span> Экстренно<br>
                                </div> -->
                            </li>
                            <li>
                                <h3 class="title">
                                    <span>Бойко Савелий</span>, 1 год<br>
                                    Спинальная мышечная атрофия 1 типа</h3>
                                <img src="<?php echo BASE_URL ?>assets/img/slider/slide-003.jpg" width="1170" height="400" alt="BoikoS" />
                                <!-- <div class="text">
                                    <span>Место рождения:</span> Ставропольский край, Новоселицкий район, с. Новоселицкое <br>
                                    <span>Цель сбора:</span> сбор на препарат Zolgensma<br>
                                    <span>Срок сбора:</span> Экстренно<br>
                                </div> -->
                            </li>
                            <li>
                                <h3 class="title">
                                    <span>Васильева Юля</span>, 6 лет<br>
                                    Нейробластома забрюшинного пространства(РАК)</h3>
                                <img src="<?php echo BASE_URL ?>assets/img/slider/slide-004.jpg" width="1170" height="400" alt="VasilevaU" />
                                <!-- <div class="text">
                                    <span>Место рождения:</span> г.Краснодар<br>
                                    <span>Цель сбора:</span> На препарат иммунотерапии "Динутуксимаб бета" в онкоцентре им. Р.М. Горбачевой.<br>
                                    <span>Срок сбора:</span> Срочно<br>
                                </div> -->
                            </li>
                        </ul>
                    </div>
                        <div class="sliderbutton" id="slideright" onclick="slideshow.move(1)"></div>
                        <ul id="pagination" class="pagination">
                            <li onclick="slideshow.pos(0)"></li>
                            <li onclick="slideshow.pos(1)"></li>
                            <li onclick="slideshow.pos(2)"></li>
                            <li onclick="slideshow.pos(3)"></li>
                        </ul>
                </div>
            </div>

            <div class="slider-form">
                <h5>ЗАПИШИТЕСЬ</h5>
                <h4>на прием к нашему специалисту!</h4>
                <form action="#" name="main_form">
                    <input required placeholder="Ваше имя" name="name" type="text" class="modal__input">
                    <input required placeholder="Ваш телефон" name="phone" type="phone" class="modal__input">
                    <input required placeholder="Ваша электронная почта" name="email" type="email" class="modal__input">
                    <h4>Мы свяжемся с вами как можно скорее!</h4>
                    <button type="submit">ЗАПИСАТЬСЯ</button>
                </form>
            </div>
        </div>
        
    </section>

    <section class="siteSection">
    <?php include("app/include/main-menu.php");
          include("app/include/asidePanel.php"); ?>

        <!-- Блок крайнего достижения -->
        <div class="siteContent__latestResult">
            <h4>Крайнее достижение</h4>
            <h5>
                <?php
                    echo (substr($indexResult['published_date'],8,2) .".". substr($indexResult['published_date'],5,2) .".". substr($indexResult['published_date'],0,4));
                ?>
            </h5>
            <a href="result.php?id=<?=$indexResult['id']?>">
                <img src="<?php echo BASE_URL."assets/img/results/".$indexResult['img'];?>">
            </a>
            <i>
                <?php 
                    $name_author = ['id' => $indexResult['id_user']];
                    $autor_topic = selectOne('users', $name_author);
                    echo $autor_topic['username'];
                ?>
            </i>
            <p><?=$indexResult['short_content'];?></p>
            <a href="<?php echo BASE_URL .'results.php'?>">Все результаты</a>
        </div>
        <div class="siteContent__usefulLinks">
            <h5>Полезные ссылки</h5>
            <!-- Вставить ссылки на разные, полезные сайты -->

        </div>
        </div>
            <!-- Основной контент сайта -->
            <div class="siteContent__mainWrapper">
                <!-- Новостной блок - последние три новости -->
                <div class="siteContent__shortNewsBlock">
                    <h2>Наши новости и акции</h2>
                    <div class="siteContent__line"></div>
                    <div class="siteContent__shortNewsBlock-wrapper">
                    <?php foreach($indexNews as $key => $item): ?>
                        <div class="siteContent__shortNewsBlock-item">
                        <a href="news.php?id=<?=$item['id']?>">
                            <img src="<?php echo BASE_URL."assets/img/news/".$item['img'];?>" alt="">
                        </a>
                            <h5>
                                <?php
                                echo (substr($item['published_date'],8,2) .".". substr($item['published_date'],5,2) .".". substr($item['published_date'],0,4));
                                ?>
                            </h5>
                            <h4>
                                <a href="<?php echo BASE_URL."assets/img/news/".$item['img'];?>">
                                    <?=$item['title']?>
                                </a>
                            </h4>
                            <p><?=$item['short_content'];?></p>
                        </div>
                    <?php endforeach; ?>
                    </div>

                    <a href="newsPromos.php">Все новости и акции</a>
                </div>

                <div class="siteContent__line"></div>

                <!-- Краткий блок О НАС -->
                <div class="siteContent__shortAboutUs-wrapper">
                    <h2>О нас</h2>
                
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat laudantium hic dolore deleniti, temporibus sapiente veritatis quisquam rerum? Voluptatibus, ipsum.</p>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad mollitia obcaecati minima fugit, tempore veniam culpa neque. Nesciunt magni omnis tempora corrupti! Architecto, neque quibusdam?</p>
                
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil porro sit inventore ipsa ab suscipit fugiat delectus ex?</p>
                
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio, perspiciatis..</p>
                
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequatur illum quae error, saepe tempora numquam eligendi adipisci pariatur eum, nobis voluptatum dignissimos nostrum quidem accusamus distinctio cupiditate libero. Tempore dolorum eius explicabo fugit, magnam exercitationem atque ut voluptates unde ea veritatis necessitatibus. Nobis reprehenderit nihil laboriosam. Eveniet ullam sed eos.</p>
                
                    <i>для детей грудного возраста (до 1 года) – минимальный курс 15 дней</i>
                    <i>для детей старше 1 года – минимальный курс 20 дней.</i>
                
                    <ii><b>Первичная консультации нейрореабилитолога, логопеда и психолога</b></ii>
                    
                    <iii><b>БЕСПЛАТНО !!!</b></iii>
                
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore praesentium totam earum numquam eius deserunt dolores consectetur. Corrupti, ea?</p>
                </div>

                <!-- Блок ссылок на болезни -->
                <?php include("app/include/healthLinks.php"); ?>
            </div>
        </div>
    </section>

    <?php include("app/include/footer.php"); ?>
    
    <script src="<?php echo BASE_URL ?>assets/js/tiny.js"></script>
    <script>
        var slideshow=new TINY.slider.slide('slideshow',{
        id:'slider',
        auto:5,
        resume:false,
        vertical:false,
        navid:'pagination',
        activeclass:'current',
        position:0,
        rewind:false,
        elastic:false,
        left:'slideleft',
        right:'slideright'
        });
    </script>
    <script src="../../assets/js/script.js"></script>
</body>
</html>
