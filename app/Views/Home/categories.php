<div>

    <?php foreach ($data as $category):?>
            <div class="form-content d-flex flex-row">
                <a href=""><input type="text" name="search" value="<?= $category->name ?>" class="form-control"><?= $category->name ?></a>
                
            </div>
        <?php endforeach;?>
</div>