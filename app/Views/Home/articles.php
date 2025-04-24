  <div class="container article-container">
   
   <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>Published by <?=esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
            <p><a href="<?= site_url("/articles/" . $article->id) ?>"><?= word_limiter($article->content, 400) ?></a></p>
        </article>
        <hr class="article-end">
        <button class="btn btn-primary read-button mb-5"><a href="<?= site_url("/articles/" . $article->id) ?>" class="button-link">Read More</a></button>
    <?php endforeach; ?>

</div>