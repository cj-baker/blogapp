<?php use CodeIgniter\I18n\Time; 
$time   = Time::now()->setDay(1)->setHour(0)->setMinute(0)->setSecond(0);
?>
<div class="sidebar flex-column float-right col-4">
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
            <option selected value="<?= $time->subMonths(1); ?>"><?= $time->subMonths(1)->toLocalizedString('MMMM yyyy')?></option>
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
</div>