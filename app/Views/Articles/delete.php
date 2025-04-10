<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Delete Blog Entry<?= $this->endSection() ?>

<?= $this->section("content") ?> 

<h1>Delete Blog Entry</h1>

<p>Are you sure you want to delete this blog?</p>

<?= form_open("articles/delete/" . $article->id) ?>

<button class="btn btn-danger">Yes</button> <a href=<?= base_url("articles/" . $article->id)?>>Cancel</a>




<?= $this->endSection() ?>