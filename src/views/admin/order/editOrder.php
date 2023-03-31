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
        Edit Order
      </h3>
      <form method="POST" autocomplete="off" action="?controller=orderAdmin&action=update&id=<?= $_GET['id'] ?>">
        <div class="w-full max-w-[1150px] rounded-[10px] border-white border mt-8 min-h-[500px] px-10 pt-5 pb-10">
          <div class="flex items-center justify-between">
            <h3 class="mb-5 text-2xl font-semibold">Delivery address:</h3>
            <div class="form-field">
              <select name="status" id="status" required>
                <option value="">Select status</option>
                <option value="<?= PENDING ?>" <?= $array['order']['status'] == PENDING ? 'selected' : '' ?>>Pending</option>
                <option value="<?= DELIVERING ?>" <?= $array['order']['status'] == DELIVERING ? 'selected' : '' ?>>Delivering</option>
                <option value="<?= COMPLETED ?>" <?= $array['order']['status'] == COMPLETED ? 'selected' : '' ?>>Completed</option>
                <option value="<?= CANCELED ?>" <?= $array['order']['status'] == CANCELED ? 'selected' : '' ?>>Canceled</option>
              </select>
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-10">
            <div class="flex items-center !w-[270px] justify-between gap-x-2">
              <span class="text-lg capitalize">name: </span>
              <span class="text-lg"><?= $array['order']['name_customer'] ?></span>
            </div>
            <div class="flex items-center gap-x-2 !w-[270px] justify-between">
              <span class="text-lg capitalize">phone number: </span>
              <span class="text-lg"><?= $array['order']['phone_number'] ?></span>
            </div>
            <div class="flex items-center gap-x-2 !w-[270px] justify-between">
              <span class="text-lg capitalize">address: </span>
              <span class="text-lg"><?= $array['order']['address_customer'] ?></span>
            </div>
          </div>
          <?php foreach ($array['data'] as $key => $value) { ?>
            <div class="border-b border-[#d3d2cd88] flex justify-between items-center mb-5 relative">
              <div class="flex gap-x-5">
                <div class=" w-[148px] max-h-[208px]">
                  <img src="imgs/best-selling.png" class="object-cover w-full h-full" alt="">
                </div>
                <div class="pt-10 text-center">
                  <h3 class="text-xl uppercase"><?= $value['name_prod'] ?></h3>
                  <p class="text-sm text-[#dacfcf] "><?= $value['name_author'] ?></p>
                </div>
              </div>
              <div class="flex flex-col pb-1 mr-10 gap-y-1">
                <div class="text-[18px] uppercase w-[180px] flex justify-between items-center">
                  <p>Amount:</p>
                  <span class="text-xl font-secondary"><?= $value['amount_order'] ?></span>
                </div>
                <!-- <p class="flex items-end mt-5 font-secondary gap-x-5"><span class="text-lg text-[#888888] font-medium ">Price:</span> <span>$ 45.00</span></p> -->
                <div class="text-[18px] uppercase w-[180px] flex justify-between items-center">
                  <p>Price:</p>
                  <span class="text-xl font-secondary"> $ <?= number_format($value['price']) ?></span>
                </div>
              </div>
            </div>
          <?php } ?>
          <div class="flex justify-between mt-10">
            <span class="text-xl">Created Day: <?php
                                                $date = date_create(explode(" ", $array['order']['createdDate'])[0]);
                                                echo date_format($date, "d/m/Y");
                                                ?></span>
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
        <button name="sbm" class="px-5 py-[10px] outline-none text-white rounded-[5px] bg-[#6a5af9] border-0 cursor-pointer min-w-[200px] mt-8 mb-8" type="submit">
          Save
        </button>
        <!-- <?= isset($error) ? $error : "" ?> -->
      </form>
    </div>
  </main>
  <script src="js/jquery.js"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
  <script src="js/test.js"></script>
</body>

</html>