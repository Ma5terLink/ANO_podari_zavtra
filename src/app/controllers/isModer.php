<?php
if($_SESSION['admin']==='0' && $_SESSION['moder']==='1') {
        header('location:'.BASE_URL."admin/news/index.php");
}