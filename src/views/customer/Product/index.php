<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/layouts/head_customer.php' ?>
    <title>Book Page</title>
</head>

<body class="bg-[#F3F2EC]">
    <?php require_once 'views/layouts/header1.php' ?>
    <?php require_once 'views/layouts/header2.php' ?>
    <main class="container ">
        <!-- banner -->
        <div class=" flex gap-10 w-full h-[500px] mt-10">
            <!-- slide -->
            <div class=" w-[60%] bg-white h-full rounded-lg">
                <div class="swiper SwiperHead">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="object-contain w-full h-full" src="./imgs/banner.png" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="object-contain w-full h-full" src="./imgs/sales-books-1.png" alt="image" />
                        </div>
                    </div>
                    <div class="swiper-pagination1 w-20 absolute p-3 "></div>
                </div>
            </div>
            <!-- banner -->
            <div class=" flex flex-col w-[50%] h-full gap-5 justify-between">
                <div class="bg-black w-full h-[50%] rounded-xl">
                    <img src="./imgs/banner3.png" class="object-cover w-full h-full rounded-xl">
                </div>
                <div class="bg-black w-full h-[50%] rounded-xl">
                    <img src="./imgs/banner2.png" class="object-cover w-full h-full rounded-xl">
                </div>
            </div>
        </div>
        <div class="relative mt-9 mx-auto w-full max-w-md">
            <form action="?controller=productCustomer&idG&mode=search" method="POST">
                <label for="search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <input id="search" name="search" value="<?php if (empty($data['search'])) {
                                                                echo "";
                                                            } else echo $data['search'];  ?>"
                        class="block w-full h-11 border border-black/50 bg-gray-100 rounded-xl py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:outline-none focus:bg-white focus:border-indigo-500 focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm"
                        placeholder="Search" type="search" autocomplete="off">
                </div>
            </form>
        </div>


        <!-- genres -->
        <div class="flex flex-col m-5 mt-7 gap-11">
            <div class="flex justify-between">
                <h1 class="justify-start text-2xl">Genres</h1>
                <div id="icon" class="justify-end">
                    <div class="swiper-pagination"></div>
                    <button class="bg-white w-[28px] h-[28px] rounded-lg hover:bg-[#FFC43F] swiper-button-prev_genre">
                        <i class="fa-solid fa-chevron-left "></i>
                    </button>
                    <button class="bg-white w-[28px] h-[28px] rounded-lg hover:bg-[#FFC43F] swiper-button-next_genre">
                        <i class="fa-solid fa-chevron-right "></i>
                    </button>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="h-40 p-3 swiper mySwiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($data['genres'] as $genre) { ?>
                        <div class="swiper-slide">
                            <div
                                class="w-[145px] h-[135px] bg-[#FBFBFB] border-solid border border-white rounded-lg flex items-center justify-center shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105 hover:bg-[#FFC43F]">
                                <a href="?controller=productCustomer&idG=<?= $genre['idGenre'] ?>&mode=3&page=1"
                                    class="flex-column">
                                    <i class="m-5 text-2xl fa-solid fa-book"></i>
                                    <p class="text-center"><?= $genre['name'] ?></p>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
        <!-- product list -->
        <div class="flex flex-col mt-5 ">
            <div class="flex justify-between">
                <h1 class="justify-start text-2xl"></h1>
                <div id="icon" class="justify-end">
                    <a href="?controller=productCustomer&key=<?php if ($_GET['mode'] == "search") {
                                                                    echo $data['search'];
                                                                }  ?>&idG=<?php if (isset($_GET['idG'])) {
                                                                                echo $_GET['idG'];
                                                                            }  ?>&mode=<?php if ($_GET['idG'] != "") {
                                                                                            echo "desc";
                                                                                        } elseif ($_GET['mode'] == 'search') {
                                                                                            echo "search_desc";
                                                                                        } else echo 1;
                                                                                        ?>&page=1"
                        class="bg-white w-[28px] h-[28px] p-1 rounded-lg hover:bg-[#FFC43F] mr-1 ">
                        <i class="fa-solid fa-arrow-down-9-1"></i>

                    </a>
                    <a href="?controller=productCustomer&key=<?php if ($_GET['mode'] == "search") {
                                                                    echo $data['search'];
                                                                }  ?>&idG=<?php if (isset($_GET['idG'])) {
                                                                                echo $_GET['idG'];
                                                                            }  ?>&mode=<?php if ($_GET['idG'] != "") {
                                                                                            echo "asc";
                                                                                        } elseif ($_GET['mode'] == 'search') {
                                                                                            echo "search_asc";
                                                                                        } else echo 2;
                                                                                        ?>&page=1"
                        class="bg-white w-[28px] h-[28px] p-1 rounded-lg hover:bg-[#FFC43F]">
                        <i class="fa-solid fa-arrow-up-1-9"></i>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <div class="grid grid-cols-4 gap-16 p-12">
                <?php foreach ($data['products'] as $product) { ?>
                <div id="<?= $product['idProduct'] ?>">
                    <div
                        class="flex-colum w-[300px] h-[400px] bg-white border-solid border border-white rounded-lg shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105">
                        <div
                            class="w-[270px] h-[235px] rounded-xl bg-[#F9F9F9] mx-auto hover:shadow-md duration-300 transition-all  ease-in-out ">
                            <a href="?controller=productCustomer&action=single_product&id=<?= $product['idProduct'] ?>"><img
                                    src="./imgs/<?= $product['img'] ?>"
                                    class=" mt-3 w-[270px] h-[235px] pt-5 object-contain cursor-pointer"></a>
                        </div>
                        <div class="flex flex-col mb-3 ml-4">
                            <a href="?controller=productCustomer&action=single_product&id=<?= $product['idProduct'] ?>"
                                class="text-left font-semibold text-lg mt-3 transition-all duration-300  hover:text-[#FFA801] hover:cursor-pointer capitalize text-[#333]"><?= $product['name'] ?></a>
                            <p class="text-left font-italic text-sm text-[#9D9D9D] ">
                                <?= $product['nameAuthor'] ?></p>
                            <p class="text-left font-italic text-sm text-[#24ff10] ">
                                <?= $product['nameGenre'] ?></p>
                        </div>
                        <div class="flex justify-between pl-4 pr-4 mt-2">
                            <p class="text-[22px] font-semibold text-left capitalize text-[#ff0202]">
                                $<?= $product['price'] ?></p>
                            <?php
                                if ($product['amount'] > 0) {
                                    $link = '?controller=cart&action=add_to_cart' . (isset($_GET['mode']) && $_GET['mode'] == "search" ? "&key=" . $data['search'] : '') . (isset($_GET['idG']) && !empty($_GET['idG']) ? "&idG=" . $_GET['idG'] : '') . '&mode=' . $_GET['mode'] . '&page=' . $_GET['page'] . '&id=' . $product['idProduct'] . '&modeA=3';
                                    echo '<a id="link_add" href="' . $link . '" class="add_to_cart_ShopPage hover:text-[#ffae00] transition-all duration-300 cursor-pointer">Add To Cart <i class="fa-solid fa-cart-shopping"></i></a>';
                                } else {
                                    echo '<p class="text-gray-600 font-semibold pt-1">Out of stock</p>';
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
        <div class="flex items-center justify-center px-4 py-10 lg:px-6">
            <div class="flex items-center justify-between w-full border-t border-gray-200 lg:w-3/5">
                <div class="flex items-center pt-3 text-gray-600 cursor-pointer hover:text-indigo-700">
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M1.1665 4L4.49984 7.33333" stroke="currentColor" stroke-width="1.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.1665 4.00002L4.49984 0.666687" stroke="currentColor" stroke-width="1.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                    echo "" . $_GET['idG'];
                                                                }  ?>&mode=<?= $_GET['mode'] ?>&page=<?= $_GET['page'] == 1 ? 1 : $_GET['page'] - 1 ?>"
                        class="ml-3 text-lg font-medium leading-none ">Previous</a>
                </div>
                <div class="hidden lg:flex">
                    <?php
                    // Use the $data['totalPage'] variable instead of $total_pages
                    for ($page = 1; $page <= $data['totalPage']; $page++) {
                        if ($page == 1 || $page == $data['totalPage'] || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                    ?>
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                            echo "" . $_GET['idG'];
                                                                        } ?>&mode=<?= $_GET['mode'] ?>&page=<?= $page ?>"
                        class="<?php if ($_GET['page'] == $page) {
                                                                                                                                        echo "text-lg font-medium leading-none cursor-pointer text-indigo-700 border-t border-indigo-400 pt-3 mr-4 px-2";
                                                                                                                                    } else echo "text-lg font-medium leading-none cursor-pointer text-gray-600 hover:text-indigo-700 border-t border-transparent hover:border-indigo-400 pt-3 mr-4 px-2" ?>">
                        <?php
                                if ($page == $_GET['page']) {
                                    echo "$page";
                                } else {
                                    echo "$page";
                                }
                                ?>
                    </a>
                    <?php
                        } elseif (($page == $_GET['page'] - 3 && $_GET['page'] > 4) || ($page == $_GET['page'] + 3 && $_GET['page'] < $data['totalPage'] - 3)) {
                        ?>
                    <span class="pt-2 pr-4 text-xl ">...</span>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="flex items-center pt-3 text-gray-600 cursor-pointer hover:text-indigo-700">
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                    echo "" . $_GET['idG'];
                                                                }  ?>&mode=<?= $_GET['mode'] ?>&page=<?= $_GET['page'] == 1 ? 1 : $_GET['page'] + 1 ?>"
                        class="mr-3 text-lg font-medium leading-none">Next</a>
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M9.5 7.33333L12.8333 4" stroke="currentColor" stroke-width="1.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.5 0.666687L12.8333 4.00002" stroke="currentColor" stroke-width="1.25"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
    </main>
    <?php include 'views/layouts/footer_customer.php' ?>
</body>

</html>