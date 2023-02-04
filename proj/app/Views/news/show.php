<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<p><?= esc($news['body']) ?></p>

<section style="display: flex;">

    <form action="/news/delete" method="post">
        <?= csrf_field() ?>
        <?= form_hidden('news_id', esc($news['id'])) ?>
        <button>Delete</button>
    </form>
</section>

<?= $this->endSection() ?>