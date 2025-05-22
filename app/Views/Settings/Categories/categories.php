<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>
<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>

<div class="content d-flex gap-5">
<div class="float-left col-8 ">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
 Add Category
</button>
<?= form_open("categories") //form needs to be added to the "helper" portion of the BaseController for this to work ?>
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
            <label for="name">Category Name</label>
            <input name="name" type="text" class="form-control" id="name" required>
            </div>
            <div class="modal-footer">
            <button class="btn btn-primary">Add</button>
            </div>
     </form>
    </div>
  </div>
</div>

   <table class="categories-table" id="myTable">
    <thead>
        <tr>
            <td>ID</td>
            <td>Category Name</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
    <?php foreach($categories as $category): ?>
            <tr>
                <td><?= ($category->id) ?></td>
                <td><?= esc($category->name) ?></td>
                
                <td>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>

                  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete this Category?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                  <div class="modal-body">
                  <?= form_open("categories/" . $category->id) ?>
                    <input type="hidden" name="_method" value="DELETE">  <!--Value needs to be DELETE in all caps -->

                    <button class="btn btn-danger">Delete</button><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </form>
                  </div>
               </td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>
   </table>
</div>
<?= $this->include("layouts/sidebar") ?>
</div>

<?= $this->endSection() ?>