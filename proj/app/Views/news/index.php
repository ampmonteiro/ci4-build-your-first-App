<h2><?= esc($title) ?></h2>

<?php if (!empty($news) && is_array($news)) : ?>

    <?php foreach ($news as $item) : ?>

        <h3>
            <?= esc($item['title']) ?>
        </h3>

        <p class="main">
            <?= esc($item['body']) ?>
        </p>
        <a href="/news/<?= esc($item['slug'], 'url') ?>">
            View article
        </a>
    <?php endforeach ?>

<?php else : ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>