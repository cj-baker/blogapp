<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>



<?php if (auth()->loggedIn()): ?>
    <nav class="d-flex flex-row gap-2">
        <p>Hello <?= esc(auth()->user()->username) ?>!</p>
        <ul class="d-flex flex-row-end gap-5 text-end">
            <li><a href="/">Home</a></li>
            <li><a href="/articles">My Blogs</a></li>
            <li><a href="<?= url_to("logout") ?>" class="text-end">Log out</a></li>
        </ul>
    </nav>
    
<?php else: ?>
    <nav>
        <a href="<?= url_to("login") ?>">Login</a>
    </nav>
    
<?php endif; ?>

<h1>Home</h1>

<?= $this->endSection() ?>