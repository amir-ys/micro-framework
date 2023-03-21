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
    <div class="mb-md-3">
        <a class="btn btn-primary" href="/categories/create">create new categories</a>
    </div>
    <?php showMessageInView('message' , 'success') ?>
   <div class="row">
       <div class="col-md-6">
           <?php foreach ($categories as $category): ?>
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
           <?php endforeach; ?>
       </div>
   </div>
</main>

</body>
<?php include view('layouts/scripts.view.php') ?>
</html>