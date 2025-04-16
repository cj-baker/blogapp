  
   <?php foreach ($articles as $article): ?>
        <article>
            <h2><a href="<?= site_url("/articles/" . $article->id) ?>"><?= esc($article->title) ?></a></h2>
            <em>By <?=esc($article->username) ?></em>
            <p><?= esc($article->content) ?></p>
        </article>

    <?php endforeach; ?>