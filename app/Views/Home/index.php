<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>


<div class="content d-flex">
<div class="blog-list float-left col-9 ">
    <h1>Latest Articles</h1>
        <?= $this->include("Home/articles") ?>
</div>
<?= $this->include("layouts/sidebar") ?>
</div>
<?= $this->endSection() ?>