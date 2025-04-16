<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
<nav class="d-flex flex-row gap-2">
<li><a href="/">Home</a></li>
<?php if (auth()->loggedIn()): ?>
    
        Hello <?= esc(auth()->user()->username) ?>!
        <ul class="d-flex flex-row-end gap-5 text-end">
            <li><a href="/articles">Blogs</a></li>
            <?php if(auth()->user()->inGroup("superadmin")): ?>
            <li><a href="/admin/users">User Managment</a></li>
            <?php endif; ?>
            <li><a href="<?= url_to("logout") ?>" class="text-end">Log out</a></li>
        </ul>
    
    
<?php else: ?>
    
        <a href="<?= url_to("login") ?>">Admin Portal</a>
   
    
<?php endif; ?>
</nav>

<?php if (session()->has("message")): ?>
    <p><?= session("message") ?></p>
<?php endif; ?>

<?php if (session()->has("error")): ?>
    <p><?= session("error") ?></p>
<?php endif; ?>


<?= $this->renderSection("content") ?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="<?php echo base_url("assets/js/index.js"); ?>"></script>


</body>
<footer></footer>
</html>