<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> Article <?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1><?= $article->title ?></h1>

<p><?= $article->content ?></p>

<?php if(auth()->loggedIn() && ($article->isOwner() || auth()->user()->can("articles.edit"))): //isOwner method was created in Articles Entities page ?>
<a href="<?= url_to("Articles::edit", $article->id) ?>" class="button-link"><button class="btn btn-primary">Edit</button></a>
<?php endif; ?>

<?php if(auth()->loggedIn() && ($article->isOwner() || auth()->user()->can("articles.delete"))): ?>
<a href="<?= url_to("Articles::confirmDelete", $article->id) ?>" class="button-link"><button class="btn btn-danger">Delete</button></a>
<?php endif; ?>

<?= $this->endSection() ?>