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
  <div class="container mt-10">
    <h2 class="mb-10 text-2xl uppercase font-secondary">bill of product</h2>
    <div class="w-full rounded-[10px] bg-[#EDEBE4] border mt-8 min-h-[500px] px-10 pt-5 pb-10">
      <div class="flex items-center justify-between">
        <h3 class="mb-10 text-2xl font-semibold">Delivery address:</h3>
      </div>
      <div class="flex flex-col gap-2 mb-10">
        <span class="text-lg uppercase">name: John</span>
        <span class="text-lg uppercase">Phone: 05112312303</span>
        <span class="text-lg uppercase">Address: New york</span>
      </div>
      <div class="border-b border-[#A8A5A5] flex justify-between items-center mb-5 relative">
        <div class="flex gap-x-5">
          <div class=" w-[148px] max-h-[208px]">
            <img src="imgs/best-selling.png" class="object-cover w-full h-full" alt="">
          </div>
          <div class="pt-10 text-center">
            <h3 class="text-xl uppercase">Way of happies</h3>
            <p class="text-sm text-[#888888] ">Ananda Kumar</p>
          </div>
        </div>
        <div class="flex flex-col pb-1 mr-10 gap-y-1">
          <div class="text-[18px] uppercase w-[180px] flex justify-between items-center">
            <p>Amount:</p>
            <span class="text-xl font-secondary">1</span>
          </div>
          <!-- <p class="flex items-end mt-5 font-secondary gap-x-5"><span class="text-lg text-[#888888] font-medium ">Price:</span> <span>$ 45.00</span></p> -->
          <div class="text-[18px] uppercase w-[180px] flex justify-between items-center">
            <p>Price:</p>
            <span class="text-xl font-secondary"> $ 50.00</span>
          </div>
        </div>
      </div>
      <!-- <div class="flex items-center justify-center">
          <img src="imgs/empty-cart.png" class="w-[300px]" alt="">
        </div> -->
      <div class="flex justify-between mt-10">
        <span class="text-xl">Created Day: <?= date('d/m/Y') ?></span>
        <div class="flex flex-col uppercase gap-y-3 min-w-[250px] text-lg">
          <div class="flex justify-between">
            <p>Total:</p>
            <span>$ 50.00</span>
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
            <span>$ 50.00</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>