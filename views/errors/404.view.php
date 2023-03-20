<!doctype html>
<html lang="en">
<head>
    <?php include view('layouts/head.view.php') ?>
</head>
<body>

<div class="container">
    <?php include view('layouts/header.view.php') ?>
    <?php include view('layouts/navbar.view.php') ?>
</div>
<main class="container">
    <div class="card border border-secendery border-5 mt-md=5">
        <div class="card-body">
            <h1 class="text-center mt-md-5"> requested page not found  </h1>
            <div class="text-center mt-md-5">
                <a  href="<?= currentDomain()  ?>">
                    home
                </a>  </div>
        </div>
    </div>
</main>

</body>
<?php include view('layouts/scripts.view.php')?>
</html>