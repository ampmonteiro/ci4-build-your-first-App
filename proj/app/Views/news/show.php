<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<p><?= esc($news['body']) ?></p>

<?= $this->endSection() ?>