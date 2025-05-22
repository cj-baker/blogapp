<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>


<div class="content d-flex">
<div class="blog-list float-left col-8 ">
    <h1>Recent Reviews</h1>
        <?= $this->include("Home/articles") ?>
</div>
<?= $this->include("layouts/sidebar") ?>
</div>
<div class="category-form d-flex flex-column align-items-end">
        <?= form_open("category") ?>
        <select name="category" class="form-select">
            <?php foreach ($categories as $category):?>
                
                <option value="<?= $category->id?>"><?= $category->name?></option> 
           
            <?php endforeach;?>
             </select>
            <button class="btn btn-primary "><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
<?= $this->endSection() ?>