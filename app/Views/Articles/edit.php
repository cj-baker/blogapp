<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Edit Blog Entry<?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1 class="mx-auto text-center mb-5 py-5">Edit Blog Entry</h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<?= form_open("articles/update/" . $article->id) //form needs to be added to the "helper" portion of the BaseController for this to work ?>

<?= $this->include("Articles/form") ?>

</form>
<?= $this->endSection() ?>