<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Search Results<?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1>Search Results for ""</h1>

<?php if (!empty($articles)) : ?>
<?php foreach ($articles as $article): ?>
    <?php if (($article->created_at->month . $article->created_at->year) === $archive) : ?>   
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>Published by <?=esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
            <p><?= $article->content ?></p>
        </article>
    <?php endif; ?>
<?php endforeach; ?>
<?php else : ?>
<p>No Blogs Found</p>
<?php endif; ?>

<?= $this->endSection() ?>