<?php include_once 'views/layouts/head_admin.php' ?>


<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="table">
            <h3>Users</h3>
            <a href="?controller=accountAdmin&action=show_formAdd">
                <button class="add-btn">Add user</button>
            </a>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($accounts as $account) { ?>
                        <tr>
                            <td>
                                <?= $account['idAccount'] ?>
                            </td>
                            <td>
                                <?= $account['name'] ?>
                            </td>
                            <td>
                                <img src="imgs/<?= $account['img'] ?>" alt="" />
                            </td>
                            <td>
                                <?= $account['phoneNumber'] ?>
                            </td>
                            <td>
                                <?= $account['email'] ?>
                            </td>
                            <td>
                                <?= $account['password'] ?>
                            </td>
                            <td>
                                <?= $account['nameRole'] ?>
                            </td>
                            <td>
                                <a href="index.php?controller=accountAdmin&action=clone_data_edit&id=<?= $account['idAccount'] ?>" title="Edit Product">
                                    <button class="edit-btn">
                                        <box-icon name="edit"></box-icon>
                                    </button>
                                </a>
                                <a href="index.php?controller=accountAdmin&action=delete&id=<?= $account['idAccount'] ?>" onclick="return confirm('Are you sure?');" title="Delete Product">
                                    <button type="button">
                                        <box-icon type="solid" name="trash"></box-icon>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="pagination-container">
                <div class="pagination">
                    <span class="pagination-inner">
                    </span>
                </div>
            </div>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>
</body>

</html>