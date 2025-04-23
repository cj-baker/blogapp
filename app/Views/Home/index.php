<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Recent Reviews</h1>

<div class="container row px-5">
    <div class="col-6">
        <?= $this->include("Home/articles") ?>
    </div>
    <div class="col-4">

    </div>

</div>



<?= $this->endSection() ?>