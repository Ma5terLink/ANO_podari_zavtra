<?php
session_start();

include "path.php";

unset ($_SESSION['id']);
unset ($_SESSION['login']);
unset ($_SESSION['admin']);
unset ($_SESSION['moder']);
unset ($_SESSION['ban']);
unset ($_SESSION['news_page']);
unset ($_SESSION['results_page']);


header('location: '.BASE_URL);