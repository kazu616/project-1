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
    <div class="px-10 rounded-[10px] py-8 bg-[#EDEBE4] flex justify-between items-center w-[70%] mb-10">
      <div class="flex items-center gap-x-5">
        <input type="checkbox" class="w-5 h-5 rounded-[10px]">
        <span>Choose all product (2 products)</span>
      </div>
      <div class="flex items-center gap-x-10">
        <span>Quantity</span>
        <span>Total Price</span>
      </div>
    </div>
    <div class="flex gap-x-[60px]">
      <div class="w-[70%] bg-[#EDEBE4] min-h-[500px] px-10">
        <div class="flex items-center item pb-5 gap-x-20 border-b border-[#7B7B7B] mt-10">
          <input type="checkbox" name="check_list[]" value="" class="z-10 w-6 h-6 bg-[#D9D9D9] cursor-pointer">
          <div class="flex gap-x-5">
            <div class="h-[150px]">
              <img src="imgs/best-selling.png" class="object-cover w-full h-full" alt="">
            </div>
            <div class="flex flex-col justify-between">
              <div class="pt-4 text-center w-[200px]">
                <h3 class="text-lg capitalize">Way of happiness</h3>
                <p class="text-sm text-[#888888] ">Ananda Kumar</p>
              </div>
              <div class="flex items-center pl-10 gap-x-2">
                <span class="line-through decoration-[#999999] text-[#999999]">$ 50.00</span>
                <p>$ 40.00</p>
              </div>
            </div>
          </div>
          <input type="number" max=10 name="" class="bg-transparent border border-[#D9D9D9] rounded-lg max-w-[130px] py-2 px-3" placeholder="Amount">
          <div class="price">$ 40.00</div>
        </div>
      </div>
      <div class="flex-1 bg-[#EDEBE4]"></div>
    </div>
  </div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>