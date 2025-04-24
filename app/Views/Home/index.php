<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>



<div class="row px-5 justify-content-between">
    <div class="col-6 blog-list">
    <h1>Recent Reviews</h1>
        <?= $this->include("Home/articles") ?>
    </div>
    <div class="col-4 sidebar">
    <?= form_open("search")?>
        <div class="search-form">
            <input type="text" name="search" placeholder="Search blogs">
            <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

</div>



<?= $this->endSection() ?>