<?php
    if(count($errMsg) > 0): ?>
    <?php foreach($errMsg as $error): ?>
        <li>ERR: <?=$error;?></li>
    <?php endforeach; ?>
<?php endif; ?>
