<!doctype html>
<html lang="en">
<head>
    <?php include base_path('/views/layouts/head.view.php') ?>
</head>
<body>

<div class="container">
    <?php include base_path('views/layouts/header.view.php') ?>
    <?php include base_path('views/layouts/navbar.view.php') ?>
</div>
<main class="container">
    <div class="card border border-secendery border-5 mt-md=5">
        <div class="card-body">
            <h1 class="text-center mt-md-5"> FORBIDDEN  </h1>
            <P class="text-center mt-md-5"> you dont have permission to access to this url  </P>
            <div class="text-center mt-md-5">
                <a  href="<?= currentDomain()  ?>">
                    home
                </a>  </div>
        </div>
    </div>
</main>

</body>
<?php include base_path('/views/layouts/scripts.view.php')?>
</html>