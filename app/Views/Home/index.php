<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Home</h1>

<?php if (auth()->loggedIn()): ?>
    <a href="<?= url_to("logout") ?>">Log out</a>
<?php else: ?>
    <a href="<?= url_to("login") ?>">Blog Admin Login</a>
<?php endif; ?>

<?= $this->endSection() ?>