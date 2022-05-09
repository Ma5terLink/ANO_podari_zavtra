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
    <link rel="stylesheet" href="<?php echo BASE_URL ?>assets/css/admin.css">

</head>
<body>

<?php if (!$_SESSION['admin'] && !$_SESSION['moder']) header('location: '.BASE_URL); ?>

<header class="header">
        <div class="logo">
            <a href="<?php echo BASE_URL ?>">
                <img src="<?php echo BASE_URL ?>assets/img/logo.png" alt="">
            </a>
        </div>
        <div class="hText">
            <div class="hText__name">Автономная некоммерческая организация содействия реабилитации лиц с ограниченными возможностями здоровья
            "Подари завтра"
            </div>
            <div class="hText__address">
                453214, Республика Башкортостан, г.Ишимбай, ул. Ленина, 56<br>
                Пн-Пт.: с 10:00 - 20:00 (без перерыва)
            </div>
        </div>
        <div class="admin_star">
            <!-- <a href="<?php echo BASE_URL ?>admin/admin.php"> -->
            <img src="<?php echo BASE_URL ?>assets/img/admin_star.png"> 
            <!-- </a> -->
        </div>
    </header>

    <!-- Админ-строка -->
    <nav class="adminString">
        <ul>
            <li>Пользователь: <b><?php echo $_SESSION['login'] ?></b>, роль: <b> 
                <?php
                    if($_SESSION['admin']) {
                        echo "админ";
                    }elseif($_SESSION['moder']) {
                        echo "модератор";
                    }
                ?></b>.</li>
            <li><b>-== АДМИНИСТРАТИВНАЯ ПАНЕЛЬ ==-</b></li>
            <li>
                <a href="<?php echo BASE_URL ?>"><b>Главная</b></a>
                /
                <a href="<?php echo BASE_URL ?>logout.php"><b>Выход</b></a>
            </li>
        </ul>
    </nav>