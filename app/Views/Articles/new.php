<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?> New Article <?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1>New Article</h1>

<?= form_open("articles/create") //form needs to be added to the "helper" portion of the BaseController for this to work ?>

<label for="title">Title</label>
<input type="text" id="title" name="title" class="d-block">

<label for="content">Content</label>
<textarea name="content" id="content" class="d-block"></textarea>

<button class="btn btn-primary">Save</button>

</form>
<?= $this->endSection() ?>