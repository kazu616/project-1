<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/output.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Booksaw</title>
</head>

<body>
  <?php require_once 'views/layouts/header1.php' ?>
  <?php require_once 'views/layouts/header2.php' ?>
  <div class="container flex gap-x-[50px] items-start mt-[100px]">
    <?php include 'views/layouts/side_bar_account.php' ?>
    <div class="flex-1 rounded-[10px]">
      <div class="flex items-center justify-between bg-[#EDEBE4] mb-10">
        <a href="?controller=order_history" class="flex items-center justify-center px-10 py-5 text-xl font-semibold text-red-500 uppercase border-b-2 border-red-500 cursor-pointer">All</a>
        <a href="?controller=order_history&status=1" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Pending</a>
        <a href="?controller=order_history&status=2" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Transport</a>
        <a href="?controller=order_history&status=3" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Complete</a>
        <a href="?controller=order_history&status=4" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Cancelled</a>
      </div>
      <div class="flex flex-col w-full gap-10 min-h-[500px]">
        <?php foreach ($array as $each) { ?>
          <div class="w-full rounded-[20px] bg-white p-5">
            <div class="flex justify-end uppercase gap-x-5 border-b border-[#888888] pb-3 mb-5">
              <div class="flex gap-x-2 pr-5 border-r border-[#888888] uppercase">
                <p>bill of lading code:</p>
                <span class="text-red-500"><?= $each['order']['bill_code'] ?></span>
              </div>
              <div class="flex gap-x-2">
                <p>Status:</p>
                <?php switch ($each['order']['status']) {
                  case PENDING:
                    echo "<span class='text-orange-500'>Pending</span>";
                    break;
                  case DELIVERING:
                    echo "<span class='text-blue-500'>Delivering</span>";
                    break;
                  case COMPLETED:
                    echo "<span class='text-green-500'>Completed</span>";
                    break;
                  case CANCELED:
                    echo "<span class='text-red-500'>Canceled</span>";
                    break;
                } ?>
              </div>
            </div>
            <?php foreach ($each['data'] as $item) { ?>
              <div class="h-[150px] px-3 flex justify-between items-end pb-3 border-b border-[#888] mb-3">
                <div class="flex h-full gap-x-4">
                  <img src="imgs/best-selling.png" class="object-cover h-full" alt="">
                  <div class="flex flex-col justify-between py-3">
                    <div class="text-center">
                      <h3 class="text-lg uppercase"><?= $item['productName'] ?></h3>
                      <p class="text-sm text-[#dacfcf]"><?= $item['authorName'] ?></p>
                    </div>
                    <span>Amount: <?= $item['amount_order'] ?></span>
                  </div>
                </div>
                <div class="flex items-center py-3 gap-x-3">
                  <p class="text-[#888]">Price:</p>
                  <span>$ <?= $item['sold_price'] ?></span>
                </div>
              </div>
            <?php } ?>
            <div class="flex items-center justify-between mb-5 text-xl">
              <p class="text-[#888888]">Created Day: <?php
                                                      $date = date_create(explode(" ", $each['order']['createdDate'])[0]);
                                                      echo date_format($date, "d/m/Y");
                                                      ?></p>
              <div class="flex items-center gap-x-3">
                <p class="text-[#888]">Total:</p>
                <span class="text-red-500">$ <?= $each['total_price'] ?></span>
              </div>
            </div>
            <div class="flex justify-end gap-x-5">
              <?php if ($each['order']['status'] == PENDING) { ?> <button class="px-3 py-2 bg-red-500 text-white font-semibold rounded-[10px]">Cancel Order</button> <?php } ?>
              <button class="px-3 py-2 bg-[#FF6B00] text-white font-semibold rounded-[10px]">Received The Confirme</button>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
  <div class="mt-10"></div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>