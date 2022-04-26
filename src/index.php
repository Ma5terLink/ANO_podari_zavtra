<?php
    include "path.php";
    include "app/database/db.php";
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
        <!-- Главное меню -->
        <nav class="mainMenu">
            <a href="#">Главная</a>
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

        <!-- Блок крайнего достижения -->
        <div class="siteContent__latestResult">
            <h4>Крайний результат :)</h4>
            <h5>26.01.2022</h5>
            <a href="#">
                <img src="<?php echo BASE_URL ?>assets/img/news/dd1.jpg">
            </a>
            <i>Ольга Сенникова</i>
            <p>Выражаем огромную благодарность центру Rehab за помощь нашим деткам!!! Мы с Рафаэлем посещаем этот центр с 2015 года!!! Мы просто безума от всех кто работает в этом центре! Все очень приветливые и заботливые, приятная, добрая атмосфера! ! Ребенку нравиться заниматься ЛФК потому что занятия проходят на плавной и размеренной ноте! Созданы все условия для эффективных занятий! Проходя курсы реабилитации в центре Рехаб у нас появляются положительные результаты! Огромное спасибо массажисту Наилю после его массажа ребенок успокаивается и снимается тонус! ЛФК всегда проходит так что бы ребенок не капризничал и делал все до максимально возможности! Спасибо вам! Мы будем ходить к вам снова и снова!</p>
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
                    <div class="siteContent__shortNewsBlock-wrapper">
                        <div class="siteContent__shortNewsBlock-item">
                            <a href="#">
                                <img src="<?php echo BASE_URL ?>assets/img/news/n1.jpg" alt="Тут какое-то описание">
                            </a>
                            <h5>15.08.2021</h5>
                            <h4>Мы работаем с сертификатами на реабилитацию детей-инвалидов‼</h4>
                            <p>Размер финансирового обеспечения одного сертификата составляет 41,7 тысячи рублей. Его можно использовать в течение двух месяцев со дня выдачи. Рассчитывать на финансовую поддержку могут дети, которые не проходили реабилитацию в государственных учреждениях в течение года.</p>
                        </div>
                        <div class="siteContent__shortNewsBlock-item">
                            <a href="#">
                                <img src="<?php echo BASE_URL ?>assets/img/news/n2.jpg" alt="Тут какое-то описание">
                            </a>
                            <h5>05.08.2021</h5>
                            <h4>МСЭ</h4>
                            <p>В нашем центре Вы можете получить заключение логопеда и психолога для прохождения медико-социальной экспертизы(МСЭ).</p>
                        </div>
                        <div class="siteContent__shortNewsBlock-item">
                            <a href="#">
                                <img src="<?php echo BASE_URL ?>assets/img/news/n3.jpg" alt="Тут какое-то описание">
                            </a>
                            <h5>01.06.2021</h5>
                            <h4>Сертификаты на реабилитацию детей--инвалидов</h4>
                            <p>Постановление Правительства Республики Башкортостан от 05 августа 2019 года №484 «Об утверждении Порядка выдачи и реализации сертификата на реабилитацию ребенка-инвалида, Формы сертификата на реабилитацию ребенка-инвалида и Порядка предоставления субсидий юридическим лицам, не являющимся государственными (муниципальными) организациями, на возмещение затрат по обеспечению детей-инвалидов реабилитационными услугами». https://npa.bashkortostan.ru/24806/</p>
                        </div>
                    </div>
                    <a href="#">Все новости и акции</a>
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
