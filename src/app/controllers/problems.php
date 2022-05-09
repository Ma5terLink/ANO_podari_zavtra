<!-- worked 02-05-22 -->
<?php
    include "app/database/db.php";

// echo "problems контроллер<br>";
$re=[];

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $lh = selectOne('links_health', ['id' => $id]);

    $therapysARR = explode(",", $lh['id_therapys']);
 
    foreach ($therapysARR as $key => $link) {
        $pageTitle = selectOne('therapys', ['id' => $link])['title'];
        $pageLink = selectOne('therapys', ['id' => $link])['id'];
        array_push($re, ['id' => $pageLink, 'title' => $pageTitle]);    
    }
    // tt($re);

}
    