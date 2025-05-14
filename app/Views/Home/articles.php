  <div class="container article-container">
   
   <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>Published by <?=esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
            <p><a href="<?= site_url("/articles/" . $article->id) ?>"><?= word_limiter($article->content, 400) ?></a></p>
        </article>
        <button class="btn btn-primary read-button mt-3 text-right mx-auto"><a href="<?= site_url("/articles/" . $article->id) ?>" class="button-link">Read More</a></button>
        <hr class="article-end">
        <?php endforeach; ?>

</div>