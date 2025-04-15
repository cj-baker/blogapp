<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Users<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Users</h1>

<table id="myTable" class="display">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email Address</th>
            <th>Active</th>
            <th>Banned</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><a href="<?= url_to("\Admin\Controllers\Users::show", $user->id) ?>"><?= esc($user->username) ?> </a></td>
                <td><?= esc($user->email) ?></td>
                <td><?= yesno($user->active) ?></td>
                <td><?= yesno($user->isBanned()) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>