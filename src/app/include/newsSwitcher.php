<div class="siteContent__resultsWrapper-links">
    Всего записей: <?=$numsNews;?>, страниц: <?=$numberOfPages;?>, записи с <?=$numsNewsOnPageFirst;?> по <?=$numsNewsOnPageSec;?><br>
    <?php if(($numberOfPages > 1) && ($_SESSION['news_page'] != 1)): ?>
        <a href="<?=BASE_URL .'newsPromos.php?page=1';?>">Начало</a>
            | 
        <a href="<?=BASE_URL ."newsPromos.php?page=".($_SESSION['news_page']-1);?>">Пред.</a>
    <?php else: ?>
    Начало | Пред.
    <?php endif; ?>

    <?php if($_SESSION['news_page'] >= 2 && $_SESSION['news_page'] < $numberOfPages): ?>
        | 
        <a href="<?=BASE_URL ."newsPromos.php?page=".($_SESSION['news_page']-1)?>"><?=$_SESSION['news_page']-1;?></a>
        <span><?=$_SESSION['news_page'];?></span>
        <a href="<?=BASE_URL ."newsPromos.php?page=".($_SESSION['news_page']+1)?>"><?=$_SESSION['news_page']+1;?></a>
        | 
        <?php else: ?>
            | <span><?=$_SESSION['news_page'];?></span> | 
    <?php endif; ?>

    <?php if(($numberOfPages > 1) && ($_SESSION['news_page'] != $numberOfPages)): ?>
        <a href="<?=BASE_URL ."newsPromos.php?page=".($_SESSION['news_page']+1);?>">След.</a>
            | 
        <a href="<?=BASE_URL ."newsPromos.php?page=".$numberOfPages;?>">Конец</a>
    <?php else: ?>
        След. | Конец
    <?php endif; ?>
</div>