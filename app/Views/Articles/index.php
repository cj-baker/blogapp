<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Articles</h1>

<?= form_open("search")?>
    <input type="text" name="search" placeholder="Search blogs">
    <button class="btn btn-primary">Search</button>
</form>

<?php if(auth()->loggedIn()): ?>
    <a href="<?=url_to("Articles::new") ?>">New Blog</a>
<?php endif; ?>
    <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>Published by <?=esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
            <p><?= $article->content ?></p>
        </article>

    <?php endforeach; ?>

    <?= $pager->simpleLinks() ?>
<?= $this->include("layouts/sidebar") ?>
<?= $this->endSection() ?>