<?php include_once 'views/layouts/head_admin.php' ?>


<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="table">
            <h3>Products</h3>
            <a href="?controller=productAdmin&action=show_formAdd">
                <button class="add-btn">Add product</button>
            </a>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Issuing date</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td>
                                <?= $product['idProduct'] ?>
                            </td>
                            <td>
                                <?= $product['name'] ?>
                            </td>
                            <td>
                                <img src="imgs/<?= $product['img'] ?>" alt="" />
                            </td>
                            <td>
                                <?= $product['nameAuthor'] ?>
                            </td>
                            <td>
                                <?= $product['price'] ?>
                            </td>
                            <td>
                                <?= $product['amount'] ?>
                            </td>
                            <td>
                                <?= $product['issuingDate'] ?>
                            </td>
                            <td>
                                <?= $product['nameGenre'] ?>
                            </td>
                            <td>
                                <a href="index.php?controller=productAdmin&action=clone_data_edit&id=<?= $product['idProduct'] ?>" title="Edit Product">
                                    <button class="edit-btn">
                                        <box-icon name="edit"></box-icon>
                                    </button>
                                </a>
                                <a href="index.php?controller=productAdmin&action=delete&id=<?= $product['idProduct'] ?>" onclick="return confirm('Are you sure?');" title="Delete Product">
                                    <button type="button">
                                        <box-icon type="solid" name="trash"></box-icon>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>

</body>

</html>