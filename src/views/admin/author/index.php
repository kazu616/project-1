<?php include_once 'views/layouts/head_admin.php' ?>

<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="flex-2">
            <div class="table" style="width: 1500px">
                <h3>Authors</h3>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <td>Image</td>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($authors as $author) { ?>
                        <tr>
                            <td>
                                <?= $author['idAuthor'] ?>
                            </td>
                            <td>
                                <?= $author['name'] ?>
                            </td>
                            <td>
                                <img src="imgs/<?= $author['img'] ?>" alt="" />
                            </td>
                            <td>
                                <?= $author['country'] ?>
                            </td>
                            <td>
                                <a href="index.php?controller=authorAdmin&action=clone_data_edit&id=<?= $author['idAuthor'] ?>"
                                    title="Edit Product">
                                    <button class="edit-btn">
                                        <box-icon name="edit"></box-icon>
                                    </button>
                                </a>
                                <a href="index.php?controller=authorAdmin&action=delete&id=<?= $author['idAuthor'] ?>"
                                    onclick="return confirm('Are you sure?');" title="Delete Product">
                                    <button type="button">
                                        <box-icon type="solid" name="trash"></box-icon>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="content" style="flex-direction: column">
                <?php include_once 'addAuthor.php'; ?>
            </div>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>
</body>

</html>