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
                            <img class="object-cover w-full h-full" src="./imgs/banner.png" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="object-cover w-full h-full" src="./imgs/banner.png" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="object-cover w-full h-full" src="./imgs/banner.png" alt="image" />
                        </div>
                    </div>
                    <!-- <div class="swiper-pagination1 absolute bottom-[20px]"></div> -->
                </div>
            </div>
            <!-- banner -->
            <div class=" flex flex-col w-[50%] h-full gap-5 justify-between">
                <div class="bg-black w-full h-[50%] rounded-xl">
                    <img src="./imgs/banner3.png" class=" rounded-xl object-cover w-full h-full">
                </div>
                <div class="bg-black w-full h-[50%] rounded-xl">
                    <img src="./imgs/banner2.png" class=" rounded-xl object-cover w-full h-full">
                </div>
            </div>
        </div>
        <!-- genres -->
        <div class="flex flex-col gap-11 m-5 mt-10">
            <div class="flex  justify-between">
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
                <div class="swiper mySwiper h-40 p-3">
                    <div class="swiper-wrapper">
                        <?php foreach ($data['genres'] as $genre) { ?>
                            <div class="swiper-slide">
                                <div class="w-[145px] h-[135px] bg-[#FBFBFB] border-solid border border-white rounded-lg flex items-center justify-center shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105 hover:bg-[#FFC43F]">
                                    <a href="?controller=productCustomer&idG=<?= $genre['idGenre'] ?>&mode=3&page=1" class="flex-column">
                                        <i class="fa-solid fa-book m-5 text-2xl"></i>
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
            <div class="flex  justify-between">
                <h1 class="justify-start text-2xl"></h1>
                <div id="icon" class="justify-end">
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                    echo "" . $_GET['idG'];
                                                                }  ?>&mode=<?php if ($_GET['idG'] != "") {
                                                                                echo "desc";
                                                                            } else echo 1;
                                                                            ?>&page=1" class="bg-white w-[28px] h-[28px] p-1 rounded-lg hover:bg-[#FFC43F] mr-1 ">
                        <i class="fa-solid fa-arrow-down-9-1"></i>

                    </a>
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                    echo "" . $_GET['idG'];
                                                                }  ?>&mode=<?php if ($_GET['idG'] != "") {
                                                                                echo "asc";
                                                                            } else echo 2;
                                                                            ?>&page=1" class="bg-white w-[28px] h-[28px] p-1 rounded-lg hover:bg-[#FFC43F]">
                        <i class="fa-solid fa-arrow-up-1-9"></i>

                    </a>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-4 p-12 gap-16">
                    <?php foreach ($data['products'] as $product) { ?>
                        <div>
                            <div class="flex-colum w-[300px] h-[400px] bg-white border-solid border border-white rounded-lg shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105">
                                <div class="w-[270px] h-[235px] rounded-xl bg-[#F9F9F9] mx-auto hover:shadow-md duration-300 transition-all  ease-in-out ">
                                    <a href="?controller=productCustomer&action=single_product&id=<?= $product['idProduct'] ?>"><img src="./imgs/<?= $product['img'] ?>" class=" mt-3 w-[270px] h-[235px] pt-5 object-contain cursor-pointer"></a>
                                </div>
                                <div class="ml-4 flex flex-col mb-3">
                                    <a href="?controller=productCustomer&action=single_product&id=<?= $product['idProduct'] ?>" class="text-left font-semibold text-lg mt-3 transition-all duration-300  hover:text-[#FFA801] hover:cursor-pointer capitalize text-[#333]"><?= $product['name'] ?></a>
                                    <p class="text-left font-italic text-sm text-[#9D9D9D] ">
                                        <?= $product['nameAuthor'] ?></p>
                                    <p class="text-left font-italic text-sm text-[#24ff10] ">
                                        <?= $product['nameGenre'] ?></p>
                                </div>
                                <div class="flex justify-between pr-4 pl-4 mt-2">
                                    <p class="text-[22px] font-semibold text-left capitalize text-[#ff0202]">
                                        $<?= $product['price'] ?></p>
                                    <a href="?controller=cart&action=add_to_cart&id=<?= $product['idProduct'] ?>" class="hover:text-[#ffae00] transition-all duration-300 cursor-pointer ">Add To
                                        Cart <i class="fa-solid fa-cart-shopping"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center py-10 lg:px-6 px-4">
            <div class="lg:w-3/5 w-full  flex items-center justify-between border-t border-gray-200">
                <div class="flex items-center pt-3 text-gray-600 hover:text-indigo-700 cursor-pointer">
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.1665 4L4.49984 7.33333" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.1665 4.00002L4.49984 0.666687" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                    echo "" . $_GET['idG'];
                                                                }  ?>&mode=<?= $_GET['mode'] ?>&page=<?= $_GET['page'] == 1 ? 1 : $_GET['page'] - 1 ?>" class="text-lg ml-3 font-medium leading-none ">Previous</a>
                </div>
                <div class="lg:flex hidden">
                    <?php
                    // Use the $data['totalPage'] variable instead of $total_pages
                    for ($page = 1; $page <= $data['totalPage']; $page++) {
                        if ($page == 1 || $page == $data['totalPage'] || ($page >= $_GET['page'] - 2 && $page <= $_GET['page'] + 2)) {
                    ?>
                            <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                            echo "" . $_GET['idG'];
                                                                        } ?>&mode=<?= $_GET['mode'] ?>&page=<?= $page ?>" class="<?php if ($_GET['page'] == $page) {
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
                            <span class=" pr-4 pt-2 text-xl ">...</span>
                    <?php
                        }
                    }
                    ?>
                </div>
                <div class="flex items-center pt-3 text-gray-600 hover:text-indigo-700 cursor-pointer">
                    <a href="?controller=productCustomer&idG=<?php if (isset($_GET['idG'])) {
                                                                    echo "" . $_GET['idG'];
                                                                }  ?>&mode=<?= $_GET['mode'] ?>&page=<?= $_GET['page'] == 1 ? 1 : $_GET['page'] + 1 ?>" class="text-lg font-medium leading-none mr-3">Next</a>
                    <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.5 7.33333L12.8333 4" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.5 0.666687L12.8333 4.00002" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            </div>
        </div>
    </main>
    <?php include 'views/layouts/footer_customer.php' ?>
</body>

</html>