<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<?= form_open('news/create') ?>
<p>
    <label for="title">Title</label>
    <input id="title" name="title" value="<?= set_value('title') ?>">
</p>

<p>
    <label for="body">Text</label>
    <textarea id="body" name="body" cols="45" rows="4"><?= set_value('body') ?></textarea>
</p>

<button>
    Create news item
</button>
<?= form_close() ?>
<?= $this->endSection() ?>