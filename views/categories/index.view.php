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
    <div class="mb-md-3">
        <a class="btn btn-primary" href="/categories/create">create new categories</a>
    </div>
    <?php showMessageInView('message', 'success') ?>
    <div class="row">
        <div class="col-md-6">
            <?php foreach ($categories as $category): ?>
                <div class="card border border-2 mb-md-1">
                    <div class="card-body">
                        <div class="text-left mb-md-2">
                            <a class="btn btn-warning" href="categories/edit?id=<?= $category->id ?>">edit</a>
                            <a class="btn btn-danger" onclick="deleteItem( <?php echo $category->id ?> )"
                               href="categories/destroy?id=<?= $category->id ?>">delete</a>
                        </div>
                        <ul>
                            <li> id : <?= $category->id ?> </li>
                            <li> title : <?= $category->title ?> </li>
                            <li> description : <?= $category->description ?> </li>
                            <li> created_at : <?= $category->created_at ?> </li>
                        </ul>
                    </div>
                </div>

                <form action="categories/destroy?id=<?= $category->id ?>" method="post"
                id="delete_item_form_<?= $category->id ?>"
                >
                    <input type="hidden" name="_method" value="DELETE">
                </form>

            <?php endforeach; ?>
        </div>
    </div>
</main>

</body>
<?php include base_path('/views/layouts/scripts.view.php') ?>
<script>
    function deleteItem(id) {
        event.preventDefault();
        document.getElementById('delete_item_form_' + id).submit()
    }
</script>
</html>
