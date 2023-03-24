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
<main class="container d-flux justify-content-between">
    <div class="row">
        <div class="col-md-6">
            <?php  showMessageInView() ?>
            <div class="card border border-2 mb-md-1">
                <div class="card-body">
                    <form action="/categories/update?id=<?= $category->id ?>" method="post">
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title"  value="<?= $category->title ?>" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description"  class="form-control" id="" cols="30" rows="10"><?= $category->description ?></textarea>
                        </div>

                        <div class="form-group mt-md-3">
                            <button type="submit"  class="btn  btn-success"> update</button>
                        </div
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
<?php include view('layouts/scripts.view.php') ?>
</html>