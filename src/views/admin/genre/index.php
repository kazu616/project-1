<?php include_once 'views/layouts/head_admin.php' ?>

<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="flex-2">

            <div class="table" style="width: 2000px">
                <div class="flex items-center justify-between">
                    <h3>Genres</h3>
                    <form action="?controller=genreAdmin&action=search" method="POST">
                        <div class="relative mb-5">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="search" name="search" id="default-search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" class="block w-[300px] pr-28 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by name genre....">
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                        </div>
                    </form>
                </div>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Genre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($array['data'])) {
                        ?>
                            <tr>
                                <td><?= $row["idGenre"] ?></td>
                                <td><?= $row["name"] ?></td>
                                <td>
                                    <a href="?controller=genreAdmin&edit=true&id=<?= $row['idGenre'] ?>">
                                        <button style="background: #000">
                                            <box-icon name="edit"></box-icon>
                                        </button>
                                    </a>
                                    <a href="?controller=genreAdmin&action=destroy&id=<?= $row['idGenre'] ?>" onclick="return confirm('Are you sure?');">
                                        <button type=" button">
                                            <box-icon type="solid" name="trash"></box-icon>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
                <div class="pagination-container">
                    <div class="flex items-center justify-center pagination">
                        <a class="pagination-newer" href="?controller=genreAdmin&page=<?= $array['page'] == 1 ? 1 : $array['page'] - 1 ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><i class="fa-solid fa-arrow-left"></i></a>
                        <span class="flex items-center pagination-inner gap-x-2">
                            <?php if ($array['page'] >= 3) {   ?><a href="?controller=genreAdmin&page=1<?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>">1</a>
                                <p class="px-4">...</p><?php } ?>
                            <?php
                            for ($i = $array['page'] != 1 ? $array['page'] - 1 : 1; $i <= ($array['page'] + 1 > $array['number_of_page'] ? $array['page'] : ($array['page'] + 1)); $i++) {
                            ?>
                                <a href="?controller=genreAdmin&page=<?= $i ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>" class=<?= isset($_GET["page"]) ? ($_GET["page"] == $i ? "pagination-active" : "") : ($i == 1 ? "pagination-active" : "") ?>><?= $i ?></a>
                            <?php } ?>
                        </span>
                        <?php if ($array['page'] <= $array['number_of_page'] - 2) { ?><p class="px-4">...</p>
                            <a href="?controller=genreAdmin&page=<?= $array['number_of_page'] ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><?= $array['number_of_page'] ?></a><?php } ?>
                        <a class="pagination-older" href="?controller=genreAdmin&page=<?= $array['page'] < $array['number_of_page'] ?  ($array['page'] + 1) : $array['page'] ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="content" style="flex-direction: column">
                <h3><?= isset($_GET['edit']) ? "Edit Genre" : "Add Genre" ?></h3>
                <form method="POST" class="form-advance" action="?controller=genreAdmin&action=<?= isset($_GET['edit']) ? "edit&id=" . $_GET['id'] : "add"  ?>" autocomplete="off">
                    <div class="form-field">
                        <input type="text" required value="<?= isset($_GET["id"]) ? $array['itemEdit']['name'] : "" ?>" class="form-input" id="product-genre" name="name" placeholder=" " />
                        <label for="product-genre" class="form-label">Genre name</label>
                    </div>
                    <button name="sbm" class="<?= isset($_GET['edit']) ? '!bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500' : '' ?>"><?= isset($_GET['edit']) ? "Edit Genre" : "Add Genre" ?></button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="js/main.js"></script>
</body>

</html>