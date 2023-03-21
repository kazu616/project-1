<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin</title>
</head>

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
                                <?= $account['img'] ?>
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
                                <?php if ($account['idRole'] == 1) {
                                    echo 'admin';
                                } else echo 'customer'; ?>
                            </td>
                            <td>
                                <a href="" title="Edit Product">
                                    <button class="edit-btn">
                                        <box-icon name="edit"></box-icon>
                                    </button>
                                </a>
                                <a href="" onclick="return confirm('Are you sure?');" title="Delete Product">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="js/main.js"></script>
</body>

</html>