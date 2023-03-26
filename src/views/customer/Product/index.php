<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Booksaw</title>
    </script>

</head>

<body class="bg-[#F3F2EC]">

    <?php require_once '../../layouts/header1.php' ?>
    <?php require_once '../../layouts/header2.php' ?>

    <main class="container ">
        <!-- banner -->
        <div class=" flex gap-10 w-full h-[500px] mt-10">
            <div class=" w-[60%] bg-white h-full rounded-lg">Slide 1</div>
            <div class=" flex flex-col w-[50%] h-full gap-5 bg-white justify-between">
                <div class="bg-black w-full h-[50%] rounded-lg">Banner 1</div>
                <div class="bg-black w-full h-[50%] rounded-lg">Banner 2</div>
            </div>
        </div>

        </div>
        <!-- genres -->
        <div class="flex flex-col gap-11 m-5 mt-10">
            <div class="flex  justify-between">
                <h1 class="justify-start text-2xl">Genres</h1>
                <div id="icon" class="justify-end">
                    <button class="bg-white w-[28px] h-[28px] rounded-lg hover:bg-[#FFC43F] ">
                        <i class="fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="bg-white w-[28px] h-[28px] rounded-lg hover:bg-[#FFC43F]">
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </div>
            </div>
            <div class="flex justify-between">
                <div class="w-[145px] h-[135px] bg-[#FBFBFB] border-solid border border-white rounded-lg flex items-center justify-center shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105 hover:bg-[#FFC43F]">
                    <div class="flex-column">
                        <i class="fa-solid fa-book m-5 text-2xl"></i>
                        <p class="text-center">Novel</p>
                    </div>
                </div>



            </div>
        </div>
        <!-- product list -->
        <div class="flex flex-col m-10">
            <div class="flex  justify-between">
                <h1 class="justify-start text-2xl"></h1>
                <div id="icon" class="justify-end">
                    <button class="bg-white w-[28px] h-[28px]  rounded-lg hover:bg-[#FFC43F] ">
                        <i class="fa-solid fa-arrow-up-z-a"></i>
                    </button>
                    <button class="bg-white w-[28px] h-[28px]  rounded-lg hover:bg-[#FFC43F]">
                        <i class="fa-solid fa-arrow-down-z-a"></i>
                    </button>
                </div>
            </div>
            <div>
                <div class="grid grid-cols-4 gap-10">
                    <div>
                        <div class="flex-colum w-[300px] h-[400px] bg-[#FBFBFB] border-solid border border-white rounded-lg shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105">
                            <img src="../../../imgs/booktest.png" class=" mt-3 w-[300px] h-[270px] object-contain border-b-[1px] ">
                            <p class="text-center font-semibold text-lg mt-3 ">Name</p>
                            <p class="text-center font-italic text-xs ">Author</p>
                            <div class="flex justify-between pr-4 pl-4 mt-2">
                                <p>Price</p>
                                <p>Amount</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="flex-colum w-[300px] h-[400px] bg-[#FBFBFB] border-solid border border-white rounded-lg shadow-md transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105">
                            <img src="../../../imgs/booktest.png" class=" mt-3 w-[300px] h-[270px] object-contain border-b-[1px] ">
                            <p class="text-center font-semibold text-lg mt-3 ">Name</p>
                            <p class="text-center font-italic text-xs ">Author</p>
                            <div class="flex justify-between pr-4 pl-4 mt-2">
                                <p>Price</p>
                                <p>Amount</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include '../../layouts/footer.php' ?>
</body>

</html>