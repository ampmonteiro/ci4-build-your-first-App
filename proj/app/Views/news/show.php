<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<p><?= esc($news['body']) ?></p>

<section style="margin-top:2rem;display: flex; gap: 10rem;">
    <a href="/news/<?= esc($news['slug'], 'url') ?>/edit">
        Edit article
    </a>
    <?= form_open(
        'news/delete',
        [],
        ['news_id' => esc($news['id'])]
    ) ?>
    <button>Delete</button>
    <?= form_close() ?>
</section>

<?= $this->endSection() ?>