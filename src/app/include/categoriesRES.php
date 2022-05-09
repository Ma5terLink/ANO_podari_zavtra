<div class="news__categories-list">
    <h4>категории</h4>
        <ul>
            <?php foreach ($topicsARR as $key => $topic): ?>
                <?php if($topic['superSection'] === "results"): ?>
                    <li>
                        <a href="#"><?= $topic['name']; ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>