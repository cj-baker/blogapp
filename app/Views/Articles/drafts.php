<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Drafts<?= $this->endSection() ?>

<?= $this->section("content") ?>
<div class="blog-list col-8">
    <h1>Drafts</h1>

    <?php if (auth()->loggedIn()): ?>
        <a href="<?= url_to("Articles::new") ?>">New Article</a>
    <?php endif; ?>
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