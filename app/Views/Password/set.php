<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Reset Password<?= $this->endSection() ?>

<?= $this->section("content") ?>  

<h1 class="mx-auto text-center mb-5 py-5">Reset Password</h1>

<?php if (session()->has("errors")): ?>
    <ul>
        <?php foreach(session("errors") as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>
                <!--If nothing is passed as the url in form_open, then the current url is used for the post method -->
<?= form_open() //form needs to be added to the "helper" portion of the BaseController for this to work ?>

<label for="password">New Password</label>
<input type="password" id="password" name="password">

<label for="password_confirmation">Confirm Password</label>
<input type="password" id="password_confirmation" name="password_confirmation">

<button>Save</button>

</form>
<?= $this->endSection() ?>