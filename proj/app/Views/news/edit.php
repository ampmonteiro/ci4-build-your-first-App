<?= $this->extend('layouts/default') ?>

<?= $this->section('content') ?>

<?= session()->getFlashdata('error') ?>
<?= validation_list_errors() ?>

<?= form_open(
    'news/update',
    [],
    ['news_id' => esc($news['id'])]
) ?>
<p>
    <label for="title">Title</label>
    <input id="title" name="title" value="<?= old('title') ?? $news['title'] ?>">
</p>

<p>
    <label for="body">Text</label>
    <textarea id="body" name="body" cols="45" rows="4"><?= old('body') ?? $news['title'] ?></textarea>
</p>

<button>
    Update
</button>
<?= form_close() ?>
<?= $this->endSection() ?>