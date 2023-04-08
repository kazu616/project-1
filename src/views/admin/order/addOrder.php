<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/toastr.min.css">
  <link rel="stylesheet" href="css/output.css">
  <link rel="stylesheet" href="css/admin.css">

  <title>Admin</title>
</head>

<body>
  <?php include_once "views/layouts/sidebar.php" ?>
  <main>
    <?php include_once "views/layouts/header_admin.php" ?>
    <div class="content" style="flex-direction: column">
      <h3 class="title-table">
        Add Order
      </h3>
      <div class="w-full max-w-[1150px] rounded-[10px] border-white border min-h-[500px] px-10 pt-5 pb-10">
        <div class="flex items-center justify-between">
          <h3 class="mb-10 text-2xl font-semibold">Products of order:</h3>
          <button class="px-5 py-[10px] outline-none text-white rounded-[5px] bg-[#6a5af9] border-0 cursor-pointer max-w-[200px]" id="btn_popup" type="button">
            Add product
          </button>
        </div>
        <?php foreach ($array['data'] as $each) { ?>
          <div class="border-b border-[#d3d2cd88] flex justify-between items-center mb-5 relative mt-10">
            <a href="?controller=orderAdmin&action=deleteProd&id=<?= $each['idProduct'] ?>" onclick="return confirm('Are you sure?');" class="absolute text-red-500 right-4 top-4">
              <i class="fa-solid fa-circle-xmark fa-lg"></i>
            </a>
            <div class="flex gap-x-5 min-h-[180px] mb-7">
              <div class=" w-[148px]">
                <img src="imgs/<?= $each['prod_image'] ?>" class="object-cover w-full h-full" alt="">
              </div>
              <div class="pt-10 text-center">
                <h3 class="text-xl uppercase"><?= $each['name_prod'] ?></h3>
                <p class="text-sm text-[#dacfcf] "><?= $each['name_author'] ?></p>
              </div>
            </div>
            <div class="flex flex-col pb-1 mr-10 gap-y-4">
              <div class="text-[18px] uppercase w-[230px] flex justify-between items-center">
                <p>Amount:</p>
                <div class="flex items-center bg-[#E2E2E2] rounded-[5px] gap-x-4 py-2">
                  <p class="hidden"><?= $each['idProduct'] ?></p>
                  <div class="py-2 cursor-pointer w-7" id="minus_amount_order">
                    <svg class="relative left-[13px]" width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M9.71875 1H1.28125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </div>
                  <span class="text-xl text-black font-secondary"><?= $each['amount_order'] ?></span>
                  <a href="?controller=orderAdmin&action=changeAmount&id=<?= $each['idProduct'] ?>&func=add" class="inline-block py-2 w-7">
                    <svg class="relative left-[5px]" width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M5.5 1.0625V8.9375M9.71875 5H1.28125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </a>
                </div>
              </div>
              <!-- <p class="flex items-end mt-5 font-secondary gap-x-5"><span class="text-lg text-[#888888] font-medium ">Price:</span> <span>$ 45.00</span></p> -->
              <div class="text-[18px] uppercase w-[230px] flex justify-between items-center">
                <p>Price:</p>
                <span class="text-xl font-secondary"> $ <?= number_format($each['price']) ?></span>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if (count($array['data']) === 0) { ?>
          <div class="flex items-center justify-center" id="img_cart_empty">
            <img src="imgs/empty-cart.png" class="w-[300px]" alt="">
          </div>
        <?php } ?>
        <div class="flex justify-between mt-10">
          <span class="text-xl">Created Day: <?= date('d/m/Y') ?></span>
          <div class="flex flex-col uppercase gap-y-3 min-w-[250px] text-lg">
            <div class="flex justify-between">
              <p>Total:</p>
              <span>$<?= $array['total_price'] ?></span>
            </div>
            <div class="flex justify-between">
              <p>Payment:</p>
              <span>COD</span>
            </div>
            <div class="flex justify-between border-b border-[#d3d2cd88] pb-2 mb-4 ">
              <p>Shipping price:</p>
              <span>$0</span>
            </div>
            <div class="flex justify-between">
              <p>Total price:</p>
              <span>$<?= $array['total_price'] ?></span>
            </div>
          </div>
        </div>
      </div>
      <a href="?controller=orderAdmin&action=checkout" class="px-5 py-[10px] outline-none inline-block max-w-[max-content] text-center text-white rounded-[5px] bg-[#6a5af9] border-0 cursor-pointer min-w-[200px] mt-5 mb-20" id="checkout_btn_admin">
        Checkout
      </a>
    </div>
  </main>
  <div class="fixed top-0 flex items-center justify-center hidden w-full h-full bg-black bg-opacity-50" id="popup_overlay">
    <div class="min-h-[80%] bg-[#28243d] min-w-[1000px] rounded-[10px] relative p-5 px-20 overflow-auto" id="popup">
      <div class="absolute text-3xl cursor-pointer top-4 right-4" id="btn_close">
        <i class="fa-regular fa-circle-xmark"></i>
      </div>
      <h3 class="mt-10 text-2xl">Products:</h3>
      <form action="?controller=orderAdmin&action=addProduct" id="form_add_prod" method="POST">
        <div class="max-h-[500px] overflow-auto list_product_pop_up">
          <?php foreach ($result['data'] as $item) { ?>
            <div class="flex items-center item pb-5 gap-x-20 border-b border-[#989393] mt-10">
              <input type="checkbox" name="check_list[]" value="<?= $item['idProduct'] ?>" class="z-10 w-6 h-6 bg-[#D9D9D9] cursor-pointer">
              <div class="flex items-center gap-x-5">
                <div class=" w-[148px]">
                  <img src="imgs/<?= $item['prod_image'] ?>" class="object-cover w-full h-full" alt="">
                </div>
                <div class="pt-4 text-center w-[200px]">
                  <h3 class="text-xl uppercase"><?= $item['name_prod'] ?></h3>
                  <p class="text-sm text-[#dacfcf] "><?= $item['name_author'] ?> </p>
                </div>
              </div>
              <input type="number" max=10 name="<?= $item['idProduct'] ?>" class="bg-transparent border border-[#D9D9D9] rounded-lg max-w-[130px] py-2 px-3" placeholder="Amount">
              <div class="price">$ <?= $item['price'] ?></div>
            </div>
          <?php } ?>
        </div>

        <div class="w-full mt-10 text-center">
          <button type="submit" class="w-[400px] px-5 py-2 bg-[#9155fd] rounded-[100vmax]">Add to order</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/toastr.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/test.js"></script>
</body>

</html>