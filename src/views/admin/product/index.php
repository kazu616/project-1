<?php include_once 'views/layouts/head_admin.php' ?>

<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="table">
            <h3>Products</h3>
            <div class="flex items-center justify-between">
                <a href="?controller=productAdmin&action=show_formAdd">
                    <button class="add-btn">Add product</button>
                </a>
                <form action="?controller=productAdmin&action=search" method="POST">
                    <div class="relative mb-5">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" name="search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" id="default-search" class="block w-[500px] pr-28 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by bill id....">
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
                        <th>Author</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Issuing date</th>
                        <th>Genre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($array['products'] as $product) { ?>
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
                                    <button style="background: #000">
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
            <div class="pagination-container">
                <div class="flex items-center justify-center pagination">
                    <a class="pagination-newer" href="?controller=productAdmin&page=<?= $array['page'] == 1 ? 1 : $array['page'] - 1 ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><i class="fa-solid fa-arrow-left"></i></a>
                    <span class="flex items-center pagination-inner gap-x-2">
                        <?php if ($array['page'] >= 3) {   ?><a href="?controller=productAdmin&page=1<?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>">1</a>
                            <p class="px-4">...</p><?php } ?>
                        <?php
                        for ($i = $array['page'] != 1 ? $array['page'] - 1 : 1; $i <= ($array['page'] + 1 > $array['number_of_page'] ? $array['page'] : ($array['page'] + 1)); $i++) {
                        ?>
                            <a href="?controller=productAdmin&page=<?= $i ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>" class=<?= isset($_GET["page"]) ? ($_GET["page"] == $i ? "pagination-active" : "") : ($i == 1 ? "pagination-active" : "") ?>><?= $i ?></a>
                        <?php } ?>
                    </span>
                    <?php if ($array['page'] <= $array['number_of_page'] - 2) {   ?><p class="px-4">...</p>
                        <a href="?controller=productAdmin&page=<?= $array['number_of_page'] ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><?= $array['number_of_page'] ?></a><?php } ?>
                    <a class="pagination-older" href="?controller=productAdmin&page=<?= $array['page'] != $array['number_of_page'] ?  ($array['page'] + 1) : $array['page'] ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>

</body>

</html>