<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>



<div class="row px-5 justify-content-center">
    <div class="col-6">
    <h1>Recent Reviews</h1>
        <?= $this->include("Home/articles") ?>
    </div>
    <div class="col-2">
    <?= form_open("search")?>
        <input type="text" name="search" placeholder="Search blogs">
        <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
    </div>

</div>



<?= $this->endSection() ?>