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
<main class="container d-flux justify-content-between">
    <div class="row">
        <div class="col-md-6">
            <?php  showMessageInView() ?>
            <div class="card border border-2 mb-md-1">
                <div class="card-body">
                    <form action="/categories/store" method="post">
                        <div class="form-group">
                            <label for="title">title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="description">description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group mt-md-3">
                            <button type="submit"  class="btn  btn-success"> store</button>
                        </div
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

</body>
<?php include base_path('/views/layouts/scripts.view.php') ?>
</html>