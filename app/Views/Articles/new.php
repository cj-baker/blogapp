<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> New Article <?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1 class="mx-auto text-center mb-5 py-5">New Blog Entry</h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<?= form_open("articles/create") //form needs to be added to the "helper" portion of the BaseController for this to work ?>
<div class="d-flex flex-column align-items-start mx-auto">
<label for="title" class="">Title</label>
<input type="text" id="title" name="title" class="form-control" value="<?= old("title") ?>">

<label for="content">Content</label>
<textarea name="content" id="content" class="d-block form-control"><?= old("content") ?></textarea>

<button class="btn btn-primary mt-5 mx-auto px-5">Save</button>
</div>
</form>
<?= $this->endSection() ?>