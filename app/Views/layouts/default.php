<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection("title") ?></title>
    <script src="<?= base_url('assets/tinymce/tinymce.min.js'); ?>" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #ff9eca;" data-bs-theme="light"">
        <div class="container-fluid d-flex flex-column gap-5">
            <div class="nav-header text-center mx-auto mb-5">
                <a class="navbar-brand" href="/">The DryerAverage</a>
                <p>Game Reviews and Reflections</p>
                <img src="<?= base_url('assets/images/peach.png'); ?>" alt="princess peach" class="nav-image img-fluid">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link <?php if(current_url() === base_url("")):?> active <?php endif; ?>" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?php if(current_url() === base_url("/articles")):?> active <?php endif; ?>" href="/articles">Blogs</a>
                </li>
                <?php if (auth()->loggedIn()): ?>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= esc(auth()->user()->username) ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="<?= base_url("/categories") ?>">Manage Categories</a></li>
                    <li><a href="<?= url_to("logout") ?>" class="dropdown-item">Logout</a></li>
                    <?php if(auth()->user()->inGroup("superadmin")): ?>
                    <li><a class="dropdown-item <?php if(current_url() === base_url("/admin/users")):?> active <?php endif; ?>" href="/admin/users">Manage Bloggers</a></li>
                    <?php endif; ?>
                </ul>
                </li>
                <?php endif; ?>
            </ul>
            </li>
            </div>
        </div>
    </nav>

<section class="content">

<?php if (session()->has("message")): ?>
    <p><?= session("message") ?></p>
<?php endif; ?>

<?php if (session()->has("error")): ?>
    <p><?= session("error") ?></p>
<?php endif; ?>


<?= $this->renderSection("content") ?>

</section>
<footer>
<div class="container-fluid d-flex flex-row justify-content-evenly">
    <div class="text-center align-items-center">
        <a class="footer-link" href="/">The DryerAverage</a>
        <p>Game Reviews and Reflections</p>
    </div>
    <ul class="d-flex flex-column justify-content-center account-links">
    <?php if (auth()->loggedIn()): ?>
        <div class="link-header">Manage Categories</div>
        <li class="footer-item">
        <a href="<?= url_to("logout") ?>" class="footer-link">Logout</a>
        </li>
        <?php else: ?>
           <li class="footer-item">
           <a href="<?= url_to("login") ?>" class="footer-link">Admin Portal</a>
           </li> 
        <?php endif; ?>
    </ul>
    <ul class="d-flex flex-column justify-content-center account-links">
        <div class="link-header">All Blogs</div>
        <li class="footer-item">
          <a class="footer-link <?php if(current_url() === base_url("/articles")):?> active <?php endif; ?>" href="/articles">Recent Reviews</a>
        </li>
    </ul>
</div>    
</footer>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/use-bootstrap-tag@2.2.2/dist/use-bootstrap-tag.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://kit.fontawesome.com/dbf5d821fc.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url("assets/js/index.js"); ?>"></script>
</body>
</html>