<?php include_once 'views/layouts/head_admin.php' ?>


<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="table">
            <h3>Users</h3>
            <div class="flex items-center justify-between">
                <a href="?controller=accountAdmin&action=show_formAdd">
                    <button class="add-btn">Add user</button>
                </a>
                <form action="?controller=orderAdmin&action=search" method="POST">
                    <div class="relative mb-5">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" name="search" class="block w-[500px] pr-28 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by bill id...." required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>
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
                            <a href="index.php?controller=accountAdmin&action=clone_data_edit&id=<?= $account['idAccount'] ?>"
                                title="Edit Product">
                                <button class="edit-btn">
                                    <box-icon name="edit"></box-icon>
                                </button>
                            </a>
                            <a href="index.php?controller=accountAdmin&action=delete&id=<?= $account['idAccount'] ?>"
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