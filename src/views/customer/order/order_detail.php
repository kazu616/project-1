<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'views/layouts/head_customer.php' ?>
    <title>Booksaw</title>
</head>

<body>
    <?php require_once 'views/layouts/header1.php' ?>
    <?php require_once 'views/layouts/header2.php' ?>
    <div class="container mt-10 mb-52">
        <h2 class="mb-10 text-2xl uppercase font-secondary">bill of product</h2>
        <div class="w-full rounded-[10px] bg-[#EDEBE4] border mt-8 min-h-[500px] px-10 pt-5 pb-10">
            <div class="flex items-center justify-between">
                <h3 class="mb-10 text-2xl font-secondary uppercase">Delivery address</h3>
            </div>
            <form action="?controller=order&action=add_data" method="POST">
                <div class="flex flex-col gap-2 mb-10">
                    <span class="text-lg uppercase text-black"><?= "Name:  " . $data['info']['name_customer'] ?></span>
                    <span class="text-lg text-[#968E8E] uppercase"><?= "Phone:  " . $data['info']['phone_number']  ?></span>
                    <span class="text-lg uppercase text-[#968e8e]"><?= "Address:  " . $data['info']['address_customer']  ?></span>
                </div>
                <?php foreach ($data['DB'] as $value) { ?>
                    <div class="border-b border-[#A8A5A5] flex justify-between items-center mb-5 relative">
                        <div class="flex gap-x-5">
                            <div class=" w-[148px] max-h-[208px]">
                                <img src="imgs/<?= $value['img'] ?>" class="object-cover w-full h-full" alt="">
                            </div>
                            <div class="pt-10 text-center">
                                <h3 class="text-xl uppercase"><?= $value['name'] ?></h3>
                                <p class="text-sm text-[#888888] "><?= $value['nameAuthor'] ?></p>
                            </div>
                        </div>
                        <div class="flex flex-col pb-1 mr-10 gap-y-1 text-lg font-extralight text-left uppercase text-black">
                            <div class="flex justify-between items-center">
                                <p>Amount:</p>
                                <span class="text-xl font-secondary text-[#888888]"><?= $value['total_amount'] ?></span>
                            </div>
                            <div class="text-[18px] uppercase w-[180px] flex justify-between items-center">
                                <p>Price:</p>
                                <span class="text-2xl font-secondary text-red-700"><?= "$ " . $value['sold_price'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="flex justify-between mt-10">
                    <span class="text-lg capitalize text-black/60 ">Created Day:
                        <?= date('d/m/Y', strtotime($value['createdDate'])) ?>
                    </span>
                    <div class="flex flex-col uppercase gap-y-3 min-w-[250px] text-lg">
                        <div class="flex justify-between">
                            <p class="font-extralight">Total:</p>
                            <span class="text-2xl text-red-700 font-secondary"><?= "$ " . $value["sold_price"] * $value['total_amount'] ?></span>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-extralight">Payment:</p>
                            <span class="text-green-300">COD</span>
                        </div>
                        <div class="flex justify-between border-b border-[#d3d2cd88] pb-2 mb-4 ">
                            <p class="font-extralight">Shipping price:</p>
                            <span class="text-2xl text-red-700 font-secondary">$0</span>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-extralight">Total price:</p>
                            <span class="text-2xl text-red-700 font-secondary"><?= "$ " . $value["sold_price"] * $value['total_amount'] ?></span>
                        </div>
                    </div>
                </div>
        </div>
        <input value="Cancel order" type="submit" class="p-[10px] relative left-[23rem] top-5 px-56 transition-all duration-500 hover:shadow-lg hover:-translate-y-1 hover:scale-105  hover:bg-[#fd6666] hover:border-white  ease-in-out hover:text-white rounded-[50px] bg-[#f5b7b7] border border-black mx-auto cursor-pointer" />
        </form>
    </div>
    <?php include 'views/layouts/footer.php' ?>
</body>

</html>