<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Article<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Articles</h1>

    <a href="<?=url_to("Articles::new") ?>">Create a New Article</a>

    <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article["id"]) ?>"><?= $article["title"] ?></a></h2>
            <p><?= $article["content"] ?></p>
        </article>

    <?php endforeach; ?>

<?= $this->endSection() ?>