<div class="article-form d-flex flex-column align-items-start mx-auto">
<label for="title" class="">Title</label>
<input type="text" id="title" name="title" class="form-control" value="<?= old("title", esc($article->title))//retains the data input in the fields after receiving an error OR retains the default data that exists for the fields within the database. ?>">

<label for="content">Content</label>
<textarea name="content" id="mytextarea" class="form-control"><?= old("content", $article->content) ?></textarea>
<label for="tags">Tags</label>
<input type="text" class="form-control" id="tags" name="tags" value="<?= old("tags", esc($article->tags))?>"/>
<label for="category">Category</label>
<select name="category_id" id="category_id" class="form-control form-select">
    <option selected  value="<?php if($article->category_id): ?><?= esc($current_category->category_id)?><?php else: ?><?php endif; ?>"><?php if($article->category_id): ?> <?= esc($current_category->name)?><?php else: ?>Choose a Category <?php endif; ?></option>
    <?php foreach ($categories as $category): ?>
    <?php if($category->id != $article->category_id): ?>
    <option value="<?= $category->id ?>"><?= esc($category->name)?></option>
    <?php endif;?>
    <?php endforeach;?> 
</select>
<label for="visibility">Visibility</label>
<select name="visibility" id="visibility" class="form-control form-select">
    <option selected  value="0">Private (Draft)</option>
    <option value="1">Publish</option> 
</select>
<button class="btn btn-primary mt-5 mx-auto px-5">Save</button>
</div>

