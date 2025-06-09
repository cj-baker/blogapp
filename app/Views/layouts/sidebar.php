<?php use CodeIgniter\I18n\Time; 
$time   = Time::now()->setDay(1)->setHour(0)->setMinute(0)->setSecond(0);
?>
<div class="sidebar flex-column col-4 py-5 align-items-center">
    <h3>SEARCH</h3>
    <div class="search-form d-flex flex-row justify-content-center">
        <?= form_open("search")?>
            <div class="form-content d-flex flex-row">
                <input type="text" name="search" placeholder="Search blogs" class="form-control">
                <button class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div>
    <hr>
    <h3>ARCHIVE</h3>
    <div class="archive-form d-flex flex-row justify-content-center">
        <?= form_open("archive") ?>
            <label for="archive">Search by Month</label>
            <div class="form-content d-flex">
            <select name="archive" class="form-select">
                <option selected value="<?= $time->subMonths(0); ?>"><?= $time->subMonths(0)->toLocalizedString('MMMM yyyy')?></option>
                <option value="<?= $time->subMonths(1); ?>"><?= $time->subMonths(1)->toLocalizedString('MMMM yyyy')?></option>
                <option value="<?= $time->subMonths(2); ?>"><?= $time->subMonths(2)->toLocalizedString('MMMM yyyy')?></option>
                <option value="<?= $time->subMonths(3); ?>"><?= $time->subMonths(3)->toLocalizedString('MMMM yyyy')?></option>
                <option value="<?= $time->subMonths(4); ?>"><?= $time->subMonths(4)->toLocalizedString('MMMM yyyy')?></option>
                <option value="<?= $time->subMonths(5); ?>"><?= $time->subMonths(5)->toLocalizedString('MMMM yyyy')?></option>
                <option value="<?= $time->subMonths(6); ?>"><?= $time->subMonths(6)->toLocalizedString('MMMM yyyy')?></option>   
            </select>
            <button class="btn btn-primary "><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
    </div> 
    <hr>
    <div>
        <h3>CATEGORIES</h3>
        <ul class="category-list">
            <?php foreach ($categories as $category):?>
                <li class="list-group-item">
                    <a href="<?= site_url("/category/". $category->id)?>"><?=$category->name?></a>
                </li>   
            <?php endforeach;?>
        </ul>   
    </div> 
</div>