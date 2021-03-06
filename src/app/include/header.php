<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL ?>assets/icons/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo BASE_URL ?>assets/icons/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL ?>assets/icons/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo BASE_URL ?>assets/icons/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL ?>assets/icons/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo BASE_URL ?>assets/icons/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo BASE_URL ?>assets/icons/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/style.css">
</head>
<body>

<?php if($_SESSION['ban']==="1") header("location:".BASE_URL."logout.php");?>

<header class="header">
        <div class="social">
            <div class="social__item">
                <a href="https://vk.com/ano_podari_zavtra" target="_blank" title="???? ?? ????">
                    <img src="<?php echo BASE_URL ?>assets/img/social/vk.svg">
                </a>
            </div>
            <div class="social__item">
                <a href="https://instagram.com/ano_podari_zavtra" target="_blank" title="???? ?? Instagram">
                    <img src="<?php echo BASE_URL ?>assets/img/social/instagram.svg">
                </a>
            </div>
        </div>
        <div class="logo">
            <a href="<?php echo BASE_URL ?>">
                <img src="<?php echo BASE_URL ?>assets/img/logo.png" alt="">
            </a>
        </div>
        <div class="hText">
            <div class="hText__name">???????????????????? ???????????????????????????? ?????????????????????? ???????????????????? ???????????????????????? ?????? ?? ?????????????????????????? ?????????????????????????? ????????????????
            "???????????? ????????????"
            </div>
            <div class="hText__address">
                453214, ???????????????????? ????????????????????????, ??.??????????????, ????. ????????????, 56<br>
                ????-????.: ?? 10:00 - 20:00 (?????? ????????????????)
            </div>
        </div>
        <form class="hSearch" action="/search">
            <input type="text" name="mainSearch" placeholder="?????????? ???? ??????????">
            <input type="submit" value="">
        </form>
            <?php if(!isset($_SESSION['id'])): ?>
                <div class="login00">
                    <a href="<?php echo BASE_URL ?>log.php">
                        <img src="<?php echo BASE_URL ?>assets/icons/login.svg" alt="">????????
                    </a>    
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['id'])): ?>
                <div class="user"><?=$_SESSION['login'];?></div>
                <div class="logout00">
                    <a title="<?=$_SESSION['login'];?>" href="<?php echo BASE_URL ?>logout.php">
                        <img src="<?php echo BASE_URL ?>assets/icons/logout.svg" alt="">??????????
                    </a>    
                </div>
            <?php endif; ?>
        <!-- ?????? ?????????? ????????????????, ???????? ?? ???????????????????????? SESSION, ?????????? ??????????-???? id -->
            <?php if ($_SESSION['admin'] || $_SESSION['moder']): ?>
                <div class="admin_star">
                    <a href="<?php echo BASE_URL ?>admin/news/index.php">
                        <img src="<?php echo BASE_URL ?>assets/img/admin_star.png"> 
                    </a>
                </div>
            <?php endif; ?>
            <!-- ?????????????????? ?????????? ???????? php -->

        <div class="hPhones">
            <a href="tel:+79874870651">+7(987)487-06-51</a>
            <a href="tel:+79174478744">+7(917)447-87-44</a>
        </div>
        <div class="hModalLink">
            <a href="#">???????????????? ????????????</a>
        </div>
    </header>