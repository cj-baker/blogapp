<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>User Groups<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>User Groups</h1>

<?= form_open("admin/users/" . $user->id . "/groups") ?>
    
    <label for="user">
        <input type="checkbox" name="groups[]" value="user"
            <?= $user->inGroup("user") ? "checked" : "" // if the User is in the group listed check the box, otehrwise leave box empty ?> > User
    </label>
    <label for="admin">
        <?php if ($user->id === auth()->user()->id): //check if the user currently logged in is the same as the one we are editing
            //If the user selected is the same as the one logged in, the admin checkbox will be disabled so that we can't uncheck it?>
            <input type="checkbox" checked disabled> Admin
            <input type="hidden" name="groups[]" value="admin">
        <?php else: ?>
            <input type="checkbox" name="groups[]" value="admin"
                <?= $user->inGroup("admin") ? "checked" : ""?> > Admin
        <?php endif; ?>
    </label>
    <button>Save</button>
    
</form>

<?= $this->endSection() ?>