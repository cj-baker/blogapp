<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>User Account<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>User</h1>

<dl>
    <dt>Username</dt>
    <dd><?= esc($user->username) ?></dd>

    <dt>Email Address</dt>
    <dd><?= esc($user->email) ?></dd>

    <dt>Created</dt>
    <dd><?= $user->created_at->humanize() ?></dd>
</dl>
<?= form_open("admin/users/" . $user->id . "/toggle-ban") ?>

    <button><?= $user->isBanned() ? "Unban" : "Ban" ?></button>

</form>

<?= $this->endSection() ?>