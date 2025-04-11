<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> Article <?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1><?= esc($article->title) ?></h1>

<p><?= esc($article->content) ?></p>

<a href="<?= url_to("Articles::edit", $article->id) ?>" class="button-link"><button class="btn btn-primary">Edit</button></a>
<a href="<?= url_to("Articles::confirmDelete", $article->id) ?>" class="button-link"><button class="btn btn-danger">Delete</button></a>
<?= $this->endSection() ?>