<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>User Permissions<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>User Permissions</h1>

<?= form_open("admin/users/" . $user->id . "/permissions") ?>
    
    <label for="articles.edit">
        <input type="checkbox" name="permissions[]" value="articles.edit"
            <?= $user->hasPermission("articles.edit") ? "checked" : "" // if the User has the permission listed check the box, otehrwise leave box empty ?> > Edit Articles
    </label>
    <label for="articles.delete">
        <input type="checkbox" name="permissions[]" value="articles.delete"
            <?= $user->hasPermission("articles.delete") ? "checked" : "" // if the User has the permission listed check the box, otehrwise leave box empty ?> > Delete Articles
    </label>
    <button>Save</button>

<?= $this->endSection() ?>