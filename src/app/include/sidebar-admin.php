 <!-- Пункты сайдбара -->
 <div class="admin__sidebar">
    <ul>
        <li>
            <a href="<?php echo BASE_URL ?>admin/news/index.php" title="Просмотр и редактирование раздела постов новостей и акций.">Новости и акции</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL ?>admin/results/index.php" title="Просмотр и редактирование раздела постов достижений и результатов.">Достижения</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL ?>admin/topics/index.php" title="Просмотр и управление категориями постов.">Категории постов</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL ?>admin/therapys/index.php" title="Просмотр и управление описанием лечебных терапий.">Терапии (стр)</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL ?>admin/linksHealth/index.php" title="Кнопки, расположенные внизу страниц, ведущие на страничку описания выбранной болезни.">"Кнопки здоровья"</a>
        </li>
        <li>
            <a href="<?php echo BASE_URL ?>admin/photoAlbums/index.php" title="Настройка и создание фотоальбомов.">Фотоальбомы</a>
        </li>
        <?php if($_SESSION['admin']==='1' && $_SESSION['moder']==='0'): ?>
            <li>
                <a href="<?php echo BASE_URL ?>admin/users/index.php" title="Просмотр и управление пользователями. Доступно ТОЛЬКО администраторам.">Пользователи</a>
            </li>
        <?php endif; ?>


    </ul>
</div>