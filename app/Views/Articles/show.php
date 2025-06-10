<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> Article - <?= $article->title ?><?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="blog-content col-8">
    <h1><?= $article->title ?></h1>

    <p><?= $article->content ?></p>

    <p>
        <em>Tags: <?= $article->tags ?></em>
        <br>
        <em>Category: <?= $category_name ?></em>
    </p>

    <?php if (auth()->loggedIn() && ($article->isOwner() || auth()->user()->can("articles.edit"))): //isOwner method was created in Articles Entities page 
    ?>
        <a href="<?= url_to("Articles::edit", $article->id) ?>" class="button-link"><button class="btn btn-primary">Edit</button></a>
    <?php endif; ?>

    <?php if (auth()->loggedIn() && ($article->isOwner() || auth()->user()->can("articles.delete"))): ?>
        <a href="<?= url_to("Articles::confirmDelete", $article->id) ?>" class="button-link"><button class="btn btn-danger">Delete</button></a>
    <?php endif; ?>
</div>
<?= $this->include("layouts/sidebar") ?>
<?= $this->endSection() ?>