<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

<?php use CodeIgniter\I18n\Time; 
$time   = Time::now()->setDay(1);
?>


<div class="content d-flex">
<div class="blog-list float-right col-8 ">
    <h1>Recent Reviews</h1>
        <?= $this->include("Home/articles") ?>
</div>
<div class="sidebar flex-column float-left col-4">
    <div class="search-form d-flex flex-row justify-content-end">
        <?= form_open("search")?>
            <div class="form-content d-flex flex-row">
                <input type="text" name="search" placeholder="Search blogs" class="form-control">
                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <h3>Archives</h3>
    <div class="archive-form d-flex flex-column align-items-end">
        
        <?= form_open("archive") ?>
            <label for="archive">Search by Month</label>
            <div class="form-content d-flex">
            <select name="archive" class="form-select">
            <option selected value="<?= $time->subMonths(1)->month . $time->year; ?>"><?= $time->subMonths(1)->toLocalizedString('MMMM yyyy')?></option>
            <option value="<?= $time->subMonths(2)->month . $time->year; ?>"><?= $time->subMonths(2)->toLocalizedString('MMMM yyyy')?></option>
            <option value="<?= $time->subMonths(3)->month . $time->year; ?>"><?= $time->subMonths(3)->toLocalizedString('MMMM yyyy')?></option>
            <option value="<?= $time->subMonths(4)->month . $time->year; ?>"><?= $time->subMonths(4)->toLocalizedString('MMMM yyyy')?></option>
            <option value="<?= $time->subMonths(5)->month . $time->year; ?>"><?= $time->subMonths(5)->toLocalizedString('MMMM yyyy')?></option>
            <option value="<?= $time->subMonths(6)->month . $time->year; ?>"><?= $time->subMonths(6)->toLocalizedString('MMMM yyyy')?></option>   
            </select>
            <button class="btn btn-primary "><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div> 
</div>
</div>





<?= $this->endSection() ?>