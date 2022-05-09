<?php
    $healthLinksARR = selectAll('links_health');
?>

<div class="siteContent__line"></div>

<div class="siteContent__whyYouHereBlock">
    <h2>Какая проблема вас к нам привела?</h2>
    <div class="siteContent__whyYouHereBlock-wrapper">
        <?php foreach ($healthLinksARR as $key => $links): ?>
            <a class="" href="problems.php?id=<?=$links['id'];?>"><?=$links['title'];?></a>
        <?php endforeach; ?>
    </div>
</div>