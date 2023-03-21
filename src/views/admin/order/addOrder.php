<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <form method="POST" autocomplete="off">
        <div class="form-basic">
          <div class="form-field">
            <input type="text" required class="form-input" id="username" name="username" placeholder=" " />
            <label for="username" class="form-label">Customer Name</label>
          </div>
          <div class="form-field">
            <input type="email" required class="form-input" name="email" id="email" placeholder=" " />
            <label for="email" class="form-label">Phone number</label>
          </div>
          <div class="form-field">
            <input type="text" required class="form-input" id="phone_number" name="phone_number" placeholder=" " />
            <label for="phone_number" class="form-label">Delivery address</label>
          </div>
          <div class="form-field">
            <select name="status" required>
              <option value="">Select status</option>
            </select>
          </div>
        </div>
        <div class="w-full max-w-[1150px] rounded-[10px] border-white border mt-8 min-h-[500px] px-10 pt-5 pb-10">
          <div class="flex items-center justify-between">
            <h3 class="mb-10 text-2xl font-semibold">Products of order:</h3>
            <button class="px-5 py-[10px] outline-none text-white rounded-[5px] bg-[#6a5af9] border-0 cursor-pointer max-w-[200px]" id="btn_popup" type="button">
              Add product
            </button>
          </div>
          <div class="border-b border-[#d3d2cd88] item-prod flex justify-between items-center mb-5">
            <div class="flex gap-x-5">
              <div class=" w-[148px] max-h-[208px]">
                <img src="imgs/best-selling.png" class="object-cover w-full h-full" alt="">
              </div>
              <div class="pt-10 text-center">
                <h3 class="text-xl uppercase">Way of happies</h3>
                <p class="text-sm text-[#dacfcf] ">Ananda Kumar </p>
              </div>
            </div>
            <div class="flex flex-col pb-10 mr-4 gap-y-1">
              <span class="text-[18px] uppercase">Amount: 1</span>
              <span class="text-[18px] uppercase">Price: $80.00 </span>
            </div>
          </div>
          <div class="flex justify-between">
            <span class="text-xl">Created Day: <?= date('d/m/Y') ?></span>
            <div class="flex flex-col uppercase gap-y-3 min-w-[250px] text-lg">
              <div class="flex justify-between">
                <p>Total:</p>
                <span>$80.00</span>
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
                <span>$50.00</span>
              </div>
            </div>
          </div>
        </div>
        <button name="sbm" class="px-5 py-[10px] outline-none text-white rounded-[5px] bg-[#6a5af9] border-0 cursor-pointer max-w-[200px] mt-8" type="submit">
          Add Order
        </button>
        <!-- <?= isset($error) ? $error : "" ?> -->
      </form>
    </div>
  </main>
  <div class="fixed top-0 items-center justify-center hidden w-full h-full bg-black bg-opacity-50" id="popup_overlay">
    <div class="min-h-[80%] bg-[#28243d] min-w-[1000px] rounded-[10px] relative p-5 px-20" id="popup">
      <div class="absolute text-3xl cursor-pointer top-4 right-4" id="btn_close">
        <i class="fa-regular fa-circle-xmark"></i>
      </div>
      <div class="mx-auto relative w-[300px] mb-10">
        <div class="search">
          <box-icon name="search-alt-2" class="absolute top-1/2 -translate-y-1/2 left-[10px] fill-[#fff]"></box-icon>
          <input type="text" placeholder="Enter something..." class="search-header" />
        </div>
      </div>
      <!-- <?php foreach ($result as $item) { ?>
        <div class="flex items-center justify-between item gap-x-20 border-b border-[#989393] mt-10">
          <input type="checkbox" name="id_prods" class="z-10 w-6 h-6 bg-[#D9D9D9] cursor-pointer">
          <div class="flex gap-x-5">
            <div class=" w-[148px] max-h-[208px]">
              <img src="imgs/<?= $item['img'] ?>" class="object-cover w-full h-full" alt="">
            </div>
            <div class="pt-16 text-center">
              <h3 class="text-xl uppercase"><?= $item['name'] ?></h3>
              <p class="text-sm text-[#dacfcf] "><? $item['nameAuthor'] ?> </p>
            </div>
          </div>
          <input type="number" class="bg-transparent border border-[##D9D9D9] rounded-lg max-w-[130px] py-2 px-3" placeholder="Amount">
          <div class="price">$ <?= $item['price'] ?></div>
        </div>
      <?php } ?> -->
      <div class="pagination-container">
        <div class="pagination">
          <span class="pagination-inner">
            <?php
            $number_of_page = 1;
            for ($i = 1; $i <= $number_of_page; $i++) {
            ?>
              <a href="?pagelayout=product&page=<?= $i ?>" class=<?= isset($_GET["page"]) ? ($_GET["page"] == $i ? "pagination-active" : "") : ($i == 1 ? "pagination-active" : "") ?>><?= $i ?></a>
            <?php } ?>
          </span>
        </div>
      </div>
      <div class="w-full mt-10 text-center">
        <button class="w-[400px] px-5 py-2 bg-[#9155fd] rounded-[100vmax]">Add to order</button>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
  <script src="js/test.js"></script>
</body>

</html>