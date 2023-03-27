<!doctype html>
<html lang="en">
<head>
    <?php include base_path('/views/layouts/head.view.php') ?>
</head>
<body>

<div class="container">
    <?php include base_path('/views/layouts/header.view.php') ?>
    <?php include base_path('/views/layouts/navbar.view.php') ?>
</div>
<main class="container">
     <div class="card border border-2 mb-md-1">
         <div class="card-body">
             <ul>
                 <li> id :  <?= $category->id ?> </li>
                 <li> title :  <?= $category->title ?> </li>
                 <li> description :  <?= $category->description  ?> </li>
                 <li> created_at :  <?= $category->created_at ?> </li>
             </ul>
         </div>
     </div>
</main>

</body>
<?php include base_path('/views/layouts/scripts.view.php') ?>
</html>