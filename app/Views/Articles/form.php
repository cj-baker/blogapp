<div class="article-form d-flex flex-column align-items-start mx-auto">
<label for="title" class="">Title</label>
<input type="text" id="title" name="title" class="form-control" value="<?= old("title", $article->title)//retains the data input in the fields after receiving an error OR retains the default data that exists for the fields within the database. ?>">

<label for="content">Content</label>
<textarea name="content" id="mytextarea" class=""><?= old("content", $article->content) ?></textarea>

<button class="btn btn-primary mt-5 mx-auto px-5">Save</button>
</div>