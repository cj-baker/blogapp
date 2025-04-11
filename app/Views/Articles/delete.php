<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Delete Blog Entry<?= $this->endSection() ?>

<?= $this->section("content") ?> 

<h1>Delete Blog Entry</h1>

<p>Are you sure you want to delete this blog?</p>

<?= form_open("articles/" . $article->id) ?>

<input type="hidden" name="_method" value="DELETE">  <!--Value needs to be DELETE in all caps -->

<button class="btn btn-danger">Yes</button> <a href=<?= base_url("articles/" . $article->id)?>>Cancel</a>




<?= $this->endSection() ?>