<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <title>Booksaw</title>

</head>

<body class="bg-[#F3F2EC]">
    <?php require_once '../../layouts/header1.php' ?>
    <?php require_once '../../layouts/header2.php' ?>
    <main class="container">
        <div class="bg-[#E9E7E0] w-full h-[1300px] mt-20 rounded-xl shadow-lg">
            <!-- <img src="../../../imgs/bg_patterns.png" class="w-[80%] absolute right-[0px]">
            <img src="../../../imgs/patterns2.png" class="w-[20%] ">
            <img src="../../../imgs/patterns1.png" class="w-[10%] bg-black absolute right-[0]"> -->
            <div class="flex flex-col h-full">
                <div class="flex w-full h-[50%]">
                    <div class="w-1/2 flex items-center justify-center">
                        <img src="../../../imgs/book_sigle_test.png" class="w-[60%]">
                    </div>
                    <div class="w-[1px] bg-[#E1DFD6] h-[90%] my-auto relative left-[-96px]"></div>
                    <div class="w-1/2 flex-col items-center justify-left relative top-[111px]">
                        <!-- name -->
                        <div>
                            <p class="w-[300px] text-2xl  text-left capitalize text-[#111]">Birds
                                gonna be happy</p>
                            <p
                                class="w-[139.34px] mt-1 text-[13px] font-medium text-left uppercase relative left-[50px] text-[#888]">
                                By Timbur
                                Hood</p>
                            <svg class="mb-16 relative left-[75px] mt-3" width="49" height="7" viewBox="0 0 49 7"
                                fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                                <path
                                    d="M1.49512 1C1.49512 1 4.86678 6 8.0824 6C11.298 6 11.4541 1 14.6697 1C17.8853 1 18.0414 6 21.257 6C24.4726 6 24.6286 1 27.8443 1C31.0599 1 31.2159 6 34.4315 6C37.6472 6 37.8032 1 41.0188 1C44.2345 1 47.6061 6 47.6061 6"
                                    stroke="#74642F" stroke-width="2"></path>
                            </svg>
                        </div>
                        <!-- author -->
                        <div class="mb-3">
                            <p class="text-base text-left text-[#888]">
                                <span class="font-medium ">Publisher: </span>
                                <span class="font-bold ml-1">Admin</span>
                            </p>
                        </div>
                        <!-- price -->
                        <div class="mb-7">
                            <p class="text-base text-left text-[#888]">
                                <span class="font-medium">Price:</span>
                                <span class="w-[159.38px] text-3xl text-left capitalize text-[#74642f] ml-3"> $ 45.00
                                </span>
                            </p>
                        </div class="mb-3">
                        <!-- amount -->
                        <div class="flex">
                            <p class="text-base text-left text-[#888] font-medium">
                                Amount:
                            </p>
                            <div class=" ml-5 flex items-center bg-[#E2E2E2] rounded-lg">
                                <button type="button"
                                    class="bg-[#E2E2E2] text-black hover:bg-gray-300 h-6 w-6 rounded-l focus:outline-none"
                                    onclick="decreaseProduct()">-</button>
                                <input type="text" class=" text-center w-8 bg-[#E2E2E2]" value="1">
                                <button type="button"
                                    class="bg-[#E2E2E2] text-black hover:bg-gray-300 h-6 w-6 rounded-r focus:outline-none"
                                    onclick="increaseProduct()">+</button>
                            </div>
                        </div>
                        <div class="mt-10 flex gap-5">
                            <button class="w-[140px] h-[50px] rounded-[15px] bg-white border border-[#9f3737]
    hover:bg-[#9f3737] hover:text-white transition-colors duration-300 shadow-md">
                                <i class="fa-solid fa-cart-shopping fa-sm mr-1"></i>
                                Add To Cart
                            </button>
                            <button class="w-[140px] h-[50px] text-white rounded-[15px] bg-[#9F3737] border border-[#9F3737]
    hover:bg-white hover:text-[#9f3737] transition-colors duration-300 shadow-md">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-col w-full h-[50%]">
                    <div class="w-[80%] bg-[#E1DFD6] h-[1px] my-auto relative left-[125px]"></div>
                    <div class="mt-5 ml-40 ">
                        <p class="text-left text-xl font-medium text-[#3d3d3d] mb-3">Book
                            description
                        </p>
                        <p class="text-base text-[#7a7a7a]">Lorem ipsum dolor sit
                            amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim
                            pharetra hac.</p>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../../layouts/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
    var mySwiper = new Swiper('.mySwiper', {
        onInit: function(slider) {
            debugger;
        },
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 5000,
        },
    });
    </script>
</body>

</html>