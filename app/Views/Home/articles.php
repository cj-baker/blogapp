  <div class="container article-container pb-5">

    <?php foreach ($articles as $article): ?>
      <article>
        <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
        <em>Published by <?= esc($article->username) ?> <?= $article->created_at->humanize() ?></em>
        <div>
          <p><?= word_limiter($article->content, 400) ?></p>
        </div>

      </article>
      <button class="btn btn-primary read-button mt-3 text-right mx-auto"><a href="<?= site_url("/articles/" . $article->id) ?>" class="button-link">Read More</a></button>
      <hr class="article-end">
    <?php endforeach; ?>
    <div class="pager pt-5"><?= $pager->simpleLinks() ?></div>
  </div>