<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "views/layouts/head_customer.php" ?>
</head>

<body>
    <?php require_once 'views/layouts/header1.php' ?>
    <?php require_once 'views/layouts/header2.php' ?>
    <div class="w-full h-full mt-10 swiper mySwiper">
        <div class="swiper-wrapper">
            <?php foreach ($slide_prods as $slide) { ?>
            <div class="flex items-center justify-center swiper-slide">
                <div class="container flex items-center gap-x-[200px] px-40">
                    <div class="flex-1">
                        <h1 class="mb-4 text-6xl font-secondary"><?= $slide['name'] ?></h1>
                        <p class="text-[#7A7A7A] mb-10 truncate_cus"><?= $slide['description'] ?></p>
                        <a href="?controller=productCustomer&action=single_product&id=<?= $slide['idProduct'] ?>">
                            <button class="px-5 py-3 uppercase bg-transparent border border-[#C0C0C0]">Read
                                More</button>
                        </a>
                    </div>
                    <div>
                        <img src="imgs/<?= $slide['img'] ?>" class="w-[300px]" alt="">
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div
            class="swiper-button-next1 py-[18px] rounded-full border border-[#797676] top-1/2 -translate-y-1/2 px-3 right-16 flex justify-center items-center cursor-pointer z-10 absolute hover:opacity-20">
            <svg width="28" height="14" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20.1324 0.445312L18.4832 1.88002L23.4999 6.14724H0V8.14127H23.4999L18.4843 12.4095L20.1324 13.8432L28 7.14425L20.1324 0.445312Z"
                    fill="#333333" />
            </svg>
        </div>
        <div
            class="swiper-button-prev1 py-[18px] rounded-full border border-[#797676] top-1/2 -translate-y-1/2 px-3 left-16 flex justify-center items-center cursor-pointer z-10 absolute hover:opacity-20">
            <svg width="28" height="14" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M7.8705 0.445312L0 7.14425L7.8705 13.8432L9.51721 12.4095L4.50328 8.14127H28V6.14724H4.50211L9.51721 1.87902L7.8705 0.445312Z"
                    fill="#333333" />
            </svg>
        </div>
        <div class="swiper-pagination !-translate-x-[440px]"></div>
    </div>
    <div class="bg-[#EDEBE4] w-full min-h-[150px] flex justify-center items-center mt-20">
        <div class="container flex items-center gap-x-[80px] justify-center">
            <img src="imgs/associate1.png" class="w-[150px] object-cover" alt="">
            <img src="imgs/associate2.png" class="w-[150px] object-cover" alt="">
            <img src="imgs/associate3.png" class="w-[150px] object-cover" alt="">
            <img src="imgs/associate4.png" class="w-[150px] object-cover" alt="">
            <img src="imgs/associate5.png" class="w-[150px] object-cover" alt="">
        </div>
    </div>
    <div class="mt-36"></div>
    <div class="container">
        <div class="flex items-end mb-14 gap-x-20">
            <div class="line w-[400px] h-[1px] bg-[#E0E0E0] -translate-y-5"></div>
            <div class="flex flex-col items-center gap-y-2">
                <span class="font-medium text-[#7A7A7A]">Some quality items</span>
                <h2 class="text-5xl font-secondary">Featured Books</h2>
            </div>
            <div class="line w-[400px] h-[1px] bg-[#E0E0E0] -translate-y-5"></div>
        </div>
        <div class="w-full swiper slider-product">
            <div class="swiper-wrapper" id="a">
                <?php foreach ($feature_prods as $each) { ?>
                <div class="swiper-slide min-h-[466px]">
                    <div class="group bg-[#EFEEE8]  relative h-[300px] mb-5">
                        <a href="?controller=productCustomer&action=single_product&id=<?= $each['idProduct'] ?>"
                            class="cursor-pointer">
                            <img src="imgs/<?= $each['img_product'] ?>"
                                class="absolute object-cover h-full -translate-x-1/2 left-1/2" alt="">
                        </a>
                        <a href="?controller=cart&action=add_to_cart&modeA=4&tele=a&id=<?= $each['idProduct'] ?>">
                            <button
                                class="absolute invisible py-2 text-white uppercase duration-200 ease-in bg-black opacity-0 cursor-pointer bottom-20 group-hover:visible group-hover:opacity-100 w-[220px] left-1/2 -translate-x-1/2">Add
                                to cart</button>
                        </a>
                    </div>
                    <div class="text-center">
                        <h4 class="text-[#74642F] text-[22px]"><?= $each['name_prod'] ?></h4>
                        <p class="text-[#888888] text-sm mb-3"><?= $each['name_author'] ?></p>
                        <span class="text-[#74642F] text-lg">$ <?= $each['price'] ?></span>
                    </div>
                </div><?php  } ?>
            </div>
            <div class="mt-10">
                <div class="swiper-pagination"></div>
                <a href="?controller=productCustomer"
                    class="z-10 float-right translate-y-[-7px] hover:text-[#74642F] hover:underline">View all
                    products</a>
            </div>
        </div>
    </div>
    <div class="mt-20"></div>
    <div id="b" class="flex items-center justify-center gap-x-[100px] bg-[#EDEBE4] py-[100px]">
        <img src="imgs/<?= $prod_best_selling['prod_image'] ?>" class="h-[550px]" alt="">
        <div class="max-w-[450px]">
            <div class="flex flex-col mb-[34px]">
                <h1 class="text-[48px] capitalize font-secondary">Best selling book</h1>
                <span class="text-[#888888] text-sm">By <?= $prod_best_selling['name_author'] ?></span>
            </div>
            <div class="mb-10">
                <h2 class="mb-5 text-3xl font-secondary"><?= $prod_best_selling['prod_name'] ?></h2>
                <span class="text-[#7A7A7A] text-sm mb-3 truncate_cus"><?= $prod_best_selling['description'] ?></span>
                <p class="flex items-end mt-5 font-secondary gap-x-5"><span
                        class="text-lg text-[#888888] font-medium ">Price:</span> <span
                        class="text-[#74642F] text-4xl">$ <?= $prod_best_selling['price'] ?></span></p>
            </div>
            <div>

                <button
                    class="min-w-[150px] border font-bold  rounded-xl <?= $prod_best_selling['amount_prod'] == 0 ? 'disabled bg-gray-300 text-gray-500' : 'bg-white text-[#a50000] border-[#a50000]' ?>"><a
                        href="?controller=cart&action=add_to_cart&tele=b&modeA=4&id=<?= $prod_best_selling['idProduct'] ?>"
                        class="px-5 py-3 inline-block <?= $prod_best_selling['amount_prod'] == 0 ? 'disabled' : '' ?>">Add
                        To Cart</a></button>


                <button
                    class="min-w-[150px] border font-bold  rounded-xl <?= $prod_best_selling['amount_prod'] == 0 ? 'disabled bg-gray-300 text-gray-500' : 'border-white bg-[#a50000] text-white' ?>"><a
                        href="?controller=cart&action=add_to_cart&id=<?= $prod_best_selling['idProduct'] ?>"
                        class="px-5 py-3 inline-block <?= $prod_best_selling['amount_prod'] == 0 ? 'disabled' : '' ?>">Buy
                        Now </a></button>

            </div>
        </div>
    </div>
    <div class="mt-16"></div>
    <div class="container border-b border-[#E0E0E0] pb-16" id="popular_book">
        <div class="flex items-end mb-14 gap-x-20">
            <div class="line w-[400px] h-[1px] bg-[#E0E0E0] -translate-y-5"></div>
            <div class="flex flex-col items-center gap-y-2">
                <span class="font-medium text-[#7A7A7A]">Some quality items</span>
                <h2 class="text-5xl font-secondary">Popular Books</h2>
            </div>
            <div class="line w-[400px] h-[1px] bg-[#E0E0E0] -translate-y-5"></div>
        </div>
        <div class="flex justify-center w-full">
            <ul class="flex gap-x-[40px] font-semibold mx-auto text-[#999999]">
                <a href="?genres=0#popular_book">
                    <li
                        class=" pb-1 px-1 <?= isset($_GET['genre']) ? ($_GET['genre'] == 0 ? "border-b-[3px]  border-b-[#9A884C] text-[#111111]" : "")  : "border-b-[3px]  border-b-[#9A884C] text-[#111111]" ?>">
                        All Genre</li>
                </a>
                <?php foreach ($array["genres"] as $genre) { ?>
                <a href="?genre=<?= $genre['idGenre'] ?>#popular_book">
                    <li
                        class="pb-1 px-1  <?= isset($_GET['genre']) ? ($_GET['genre'] == $genre['idGenre'] ? "border-b-[3px]  border-b-[#9A884C] text-[#111111]" : "")  : "" ?>">
                        <?= $genre['name'] ?></li>
                </a>
                <?php } ?>
            </ul>
        </div>
        <div id="c" class="grid grid-cols-4 gap-10 mt-10">
            <?php foreach ($prod_by_category as $each) { ?>
            <div class="swiper-slide min-h-[466px]">
                <div class="group px-5 py-3 bg-[#EFEEE8] h-[300px] mb-5 relative">
                    <a href="?controller=productCustomer&action=single_product&id=<?= $each['idProduct'] ?>"
                        class="cursor-pointer">
                        <img src="imgs/<?= $each['img_product'] ?>"
                            class="absolute object-cover h-full -translate-x-1/2 left-1/2" alt="">
                    </a>
                    <a href="?controller=cart&action=add_to_cart&modeA=4&tele=c&id=<?= $each['idProduct'] ?>">
                        <button
                            class="absolute invisible py-2 text-white uppercase duration-200 ease-in bg-black opacity-0 cursor-pointer bottom-20 group-hover:visible group-hover:opacity-100 w-[220px] left-1/2 -translate-x-1/2">Add
                            to cart</button>
                    </a>
                </div>
                <div class="text-center">
                    <h4 class="text-[#74642F] text-[22px]"><?= $each['name_prod'] ?></h4>
                    <p class="text-[#888888] text-sm mb-3"><?= $each['name_author'] ?></p>
                    <span class="text-[#74642F] text-lg">$ <?= $each['price'] ?></span>
                </div>
            </div><?php  } ?>
        </div>
    </div>
    <div class="max-w-[736px] mx-auto pt-20 text-center mb-20">
        <div class="flex flex-col items-center justify-center gap-y-2">
            <h2 class="text-5xl font-secondary">Quote of the day</h2>
            <svg width="48" height="7" viewBox="0 0 48 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1 1C1 1 4.36355 6 7.57143 6C10.7793 6 10.935 1 14.1429 1C17.3507 1 17.5064 6 20.7143 6C23.9222 6 24.0778 1 27.2857 1C30.4936 1 30.6493 6 33.8571 6C37.065 6 37.2207 1 40.4286 1C43.6365 1 47 6 47 6"
                    stroke="#74642F" stroke-width="2" />
            </svg>
        </div>
        <p class="text-2xl mt-12 mb-5 text-[#7A7A7A]">“The more that you read, the more things you will know. The more
            that you learn, the more places you’ll go.”</p>
        <span class="text-xl font-secondary">Dr. Seuss</span>
    </div>
    <div class="bg-[#EDEBE4] min-h-[400px] flex justify-center items-center" id="subcribe">
        <div class="flex gap-x-48">
            <div class="max-w-[330px]">
                <h1 class="text-5xl leading-[60px] capitalize font-secondary">Subcribe to our newsletter</h1>
                <svg width="48" height="8" viewBox="0 0 48 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1 1.94092C1 1.94092 4.36355 6.94092 7.57143 6.94092C10.7793 6.94092 10.935 1.94092 14.1429 1.94092C17.3507 1.94092 17.5064 6.94092 20.7143 6.94092C23.9222 6.94092 24.0778 1.94092 27.2857 1.94092C30.4936 1.94092 30.6493 6.94092 33.8571 6.94092C37.065 6.94092 37.2207 1.94092 40.4286 1.94092C43.6365 1.94092 47 6.94092 47 6.94092"
                        stroke="#74642F" stroke-width="2" />
                </svg>

            </div>
            <div class="max-w-[550px]">
                <p class="text-[#7A7A7A] mb-[40px]">Sed eu feugiat amet, libero ipsum enim pharetra hac dolor sit amet,
                    consectetur. Elit adipiscing enim pharetra hac.</p>
                <form class="w-[400px] relative" action="index.php?action=seo" method="post">
                    <input type="email" placeholder="Enter your email addresss here" name="email"
                        class="outline-none pr-16 text-xl w-full py-2 bg-transparent border-b border-[#6F6F6F]">
                    <button class="absolute font-medium uppercase -translate-y-1/2 right-2 top-1/2"
                        type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <?php include 'views/layouts/footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
    var mySwiper = new Swiper('.mySwiper', {
        onInit: function(slider) {
            debugger;
        },
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next1',
            prevEl: '.swiper-button-prev1',
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 5000,
        },
        // disableOnInteraction: false
        // pauseOnMouseEnter: true
    });
    const swiper = new Swiper(".slider-product", {
        slidesPerView: 4,
        spaceBetween: 50,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
            dynamicBullets: true,
            dynamicMainBullets: 4
        },
    });
    // search
    let search_bar = document.getElementById("search");
    let btn_search = document.getElementById("toggle-search");

    btn_search.addEventListener("click", function() {
        btn_search.classList.add('hidden');
        search_bar.classList.remove('hidden');
    })

    document.addEventListener("click", (event) => {
        if (!search_bar.contains(event.target) && !event.target.closest("#toggle-search") && !event.target
            .closest(
                "#search")) {
            btn_search.classList.remove('hidden');
            search_bar.classList.add('hidden');
            console.log("Clicked outside of search box");
        }
    });
    // alert custome

    function showAlert(message) {
        var alertElement = document.createElement('div');
        alertElement.classList.add('custom-alert');
        alertElement.innerHTML = '<p>' + message + '</p>';
        document.body.appendChild(alertElement);
        setTimeout(function() {
            alertElement.remove();
        }, 1500);

    }
    // check if the URL contains the added_to_cart parameter
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('added_to_cart')) {
        showAlert('Product added to cart successfully!');
    }
    </script>
</body>

</html>