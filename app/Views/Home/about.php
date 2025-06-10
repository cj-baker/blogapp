<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>


<div class="content d-flex">
<div class="about-me float-left col-8 ">
    <h1>About DryerAverage</h1>
    <p></p>
</div>
<?= $this->include("layouts/sidebar") ?>
</div>
<?= $this->endSection() ?>