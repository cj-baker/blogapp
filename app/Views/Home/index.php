<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Home</h1>

<?= $this->include("Home/articles") ?>

<?= $this->endSection() ?>