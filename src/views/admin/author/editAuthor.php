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
                        <?php foreach ($data_clone['author_show'] as $author) { ?>
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
                                    <a href="index.php?controller=authorAdmin&action=clone_data_edit&id=<?= $author['idAuthor'] ?>" title="Edit Product">
                                        <button class="edit-btn" style="background: black;">
                                            <box-icon name="edit"></box-icon>
                                        </button>
                                    </a>
                                    <a href="index.php?controller=authorAdmin&action=delete&id=<?= $author['idAuthor'] ?>" onclick="return confirm('Are you sure?');" title="Delete Product">
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
                <h3>Edit Author</h3>
                <?php foreach ($data_clone['clone_author'] as $data_author) { ?>
                    <form method="POST" class="form-advance" autocomplete="off" enctype="multipart/form-data" action="index.php?controller=authorAdmin&action=edit">
                        <input type="hidden" value="<?= $data_author['idAuthor'] ?>" name="id" />
                        <input type="hidden" value="<?= $data_author['img'] ?>" name="old_img" />
                        <div class="form-field">
                            <input type="text" required value="<?= $data_author['name'] ?>" class="form-input" name="name" placeholder=" " />
                            <label for="" class="form-label">Author name</label>
                        </div>
                        <div class="form-field">
                            <input type="text" required value="<?= $data_author['country'] ?>" class="form-input" name="country" placeholder=" " />
                            <label for="" class="form-label">Country name</label>
                        </div>
                        <div class="form-field">
                            <label for="product-image">URL Image: </label>
                            <input type="file" name="image" id="product-image">
                            <img class="preview_image" src="<?php echo "imgs/" . $data_author['img']; ?>" alt="">
                        </div>
                        <button name="sbm">Edit Author</button>
                    </form>
                <?php } ?>
            </div>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>

</body>

</html>