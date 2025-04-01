<?= $this->extend("layouts/default") ?>
<?= $this->section("title") ?>Set New Password<?= $this->endSection() ?>
<?= $this->section("content") ?>

<h1>Set New Password</h1>
<?php if (session()->has("errors")):?>
    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
            <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?= form_open() // passing nothing in parentheses defaults to currect page?> 

<label for="password">Password</label>
<input type="password" id="password" name="password" >

<label for="password_confirmation">Password Confirmation</label>
<input type="password" id="password_confirmation" name="password_confirmation">

<button>Update</button>

</form>

<?= $this->endSection() ?>