<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Articles</h1>
<?php if(auth()->loggedIn()): ?>
    <a href="<?=url_to("Articles::new") ?>">New Blog</a>
<?php endif; ?>
    <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>By <?=esc($article->username) ?></em>
            <p><?= esc($article->content) ?></p>
        </article>

    <?php endforeach; ?>

    <?= $pager->simpleLinks() ?>

<?= $this->endSection() ?>