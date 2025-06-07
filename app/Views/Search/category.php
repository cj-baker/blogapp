<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Search Results<?= $this->endSection() ?>

<?= $this->section("content") ?>  
<h1>Search Results for "<?= esc($category) ?>"</h1>
<?php if (!empty($articles)) : ?>
<?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>Published by <?=esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
            <p><?= $article->content ?></p>
        </article>

<?php endforeach; ?>
<?php else : ?>
<p class="not-found">No Blogs Found</p>
<?php endif; ?>

<?= $this->endSection() ?>