<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>All Articles<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="blog-list col-8">
    <div class="d-flex align-items-center justify-content-between">
        <h1>All Articles</h1>
    <?php if (auth()->loggedIn()): ?>
        <a class="new-button pe-5" href="<?= url_to("Articles::new") ?>"><button class="btn btn-primary">+ New Article</button></a>  
    <?php endif; ?>
    </div>
    <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>Published by <?= esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
            <p><?= $article->content ?></p>
        </article>

    <?php endforeach; ?>

    <div class="pager"><?= $pager->simpleLinks() ?></div>
</div>
 
<?= $this->include("layouts/sidebar") ?>
<?= $this->endSection() ?>