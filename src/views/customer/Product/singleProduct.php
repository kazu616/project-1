<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/layouts/head_customer.php' ?>
    <title>Sigle Product</title>
</head>

<body class="bg-[#F3F2EC]">
    <?php require_once 'views/layouts/header1.php' ?>
    <?php require_once 'views/layouts/header2.php' ?>
    <main class="container relative mt-28 ">
        <div class="bg-[#eeede8] h-[1000px] w-full rounded-lg flex-col shadow-lg">
            <div class="flex justify-center p-10 ">
                <?php foreach ($data_pr as $product) { ?>
                    <div class="w-[390px] h-[513px]">
                        <img src="imgs/<?= $product['img'] ?>" class="object-contain w-[390px] h-[508px]  relative top-3 right-[50%] " />
                    </div>
                    <div class="bg-[#e1dfd6] rounded-sm w-[1px] h-[500px] relative top-[15px] right-[15%] "></div>
                    <div class="flex flex-col relative top-16 right-[5%] gap-3">
                        <div class="pb-10 ">
                            <p class="text-3xl text-left font-extralight capitalize text-[#111] font-secondary">
                                <?= $product['name'] ?></p>
                            <p class="text-xs font-medium text-center uppercase text-[#888] "><?= $product['nameAuthor'] ?>
                            </p>
                        </div>
                        <p>
                            <span class="text-sm font-medium text-left text-[#888] pr-2">Author: </span>
                            <span class="text-base font-bold text-left text-[#888]"><?= $product['nameAuthor'] ?></span>
                        </p>
                        <p>
                            <span class="text-sm font-medium text-left text-[#888] pr-2 ">Genre: </span>
                            <span class="text-base font-bold text-left text-[#888]"><?= $product['nameGenre'] ?></span>
                        </p>
                        <p>
                            <span class="text-base font-medium text-left text-[#888] pr-2 ">Total
                                products: </span>
                            <span id="totalProduct" class="text-base font-bold font-secondary text-left text-[#888]"><?= $product['amount'] ?></span>
                        </p>
                        <p class="pb-5 pt-2">
                            <span class="text-sm font-medium text-left text-[#888] pr-2">Price: </span>
                            <span class="text-3xl text-left capitalize text-[#74642f] font-secondary ">$ 45.00</span>
                        </p>
                        <div class="flex gap-4 pt-2 pb-3">
                            <p class="text-sm font-medium text-left text-[#888] pr-2">Amount: </p>
                            <div class="flex items-center bg-[#E2E2E2] h-8 rounded-md text-center relative bottom-[10px] font-secondary">
                                <button id="minus" class=" w-7 cursor-pointer">
                                    <i class="fa-solid fa-minus text-xs"></i>
                                </button>
                                <input class="input_amount w-10 bg-[#E2E2E2] text-center" value="1" />
                                <button id="plus" class="w-7">
                                    <i class="fa-solid fa-plus text-xs"></i>
                                </button>
                            </div>
                        </div>
                        <div class="flex gap-3">
                            <input id="data" type="hidden" value="<?= $product['idProduct'] ?>" />
                            <a id="add_to_cart" href="" class="<?php if ($product['amount'] > 0) {
                                                                    echo "transition-all hover:bg-black hover:text-white duration-200 hover:shadow-lg hover:-translate-y-1 hover:scale-105 w-36 text-center cursor-pointer h-12 rounded-[15px] pt-3 text-[#a50000] shadow-md bg-white border capitalize border-[#9f3737]";
                                                                } else {
                                                                    echo "w-36 text-center cursor-not-allowed h-12 rounded-[15px] pt-3 text-gray-500 bg-gray-300 border capitalize ";
                                                                } ?>">
                                <i class="fa-sharp fa-solid fa-cart-shopping"></i>
                                Add to cart
                            </a>
                            <a id="buy_now" href="" class="<?php if ($product['amount'] > 0) {
                                                                echo "pt-3 w-36 text-center transition-all hover:bg-black hover:text-white duration-300 cursor-pointer h-12 rounded-[15px]  text-white shadow-md bg-[#a50000] border capitalize border-[#9f3737]";
                                                            } else echo "w-36 text-center cursor-not-allowed h-12 rounded-[15px] pt-3 text-gray-500 bg-gray-300 border capitalize" ?> ">
                                Buy Now</a>
                        </div>
                    </div>
            </div>
            <div class="bg-[#e1dfd6] absolute rounded-sm w-[80%] translate-x-[15%] h-[1px] mt-3"></div>
            <div class="mt-10">
                <p class=" ml-40 text-xl font-medium text-left text-[#3d3d3d] capitalize ">Book description</p>
                <p class="text-[#7a7a7a] ml-40 mt-3 text-left text-base"><?= $product['description'] ?></p>
            </div>
        </div>
    <?php } ?>
    </main>
    <?php include 'views/layouts/footer_customer.php' ?>
    <script src="views/customer/Product/checkAmount.js"></script>
</body>

</html>