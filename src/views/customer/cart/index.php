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
    <h2 class="mb-10 text-2xl uppercase font-secondary">Cart page (2 products)</h2>
    <div class="px-10 rounded-[10px] py-8 bg-[#EDEBE4] flex justify-between items-center w-[75%] mb-10">
      <div class="flex items-center gap-x-5">
        <input type="checkbox" class="w-6 h-6 rounded-[10px]">
        <span>Choose all product (2 products)</span>
      </div>
      <div class="flex items-center pr-28 gap-x-[90px]">
        <span>Quantity</span>
        <span>Total Price</span>
      </div>
    </div>
    <div class="flex gap-x-[40px] items-start">
      <div class="w-[75%] bg-[#EDEBE4] min-h-[500px] px-10  rounded-[10px]">
        <?php for ($i = 1; $i <= 2; $i++) {  ?>
          <div class="flex items-center item pb-5 gap-x-20 border-b border-[#a8a1a1] mt-10">
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
            <div class="flex items-center gap-x-5 bg-[#E2E2E2] px-5 rounded-[5px] py-2">
              <span>
                <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M9.71875 1H1.28125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
              <span>1</span>
              <span>
                <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M5.5 1.0625V8.9375M9.71875 5H1.28125" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
              </span>
            </div>
            <div class="price">$ 40.00</div>
            <div>
              <svg width="30" height="33" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.625 9.40625L11.3438 36.2812C11.4254 37.8341 12.5812 38.9688 14.0938 38.9688H29.9062C31.4248 38.9688 32.5591 37.8341 32.6562 36.2812L34.375 9.40625" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6.875 9.40625H37.125H6.875Z" fill="black" />
                <path d="M6.875 9.40625H37.125" stroke="black" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
                <path d="M16.5 9.40626V6.04688C16.4992 5.78197 16.552 5.51952 16.6554 5.27462C16.7588 5.02972 16.9106 4.80721 17.1023 4.61989C17.294 4.43257 17.5217 4.28413 17.7723 4.18311C18.0229 4.08209 18.2914 4.03048 18.5625 4.03126H25.4375C25.7086 4.03048 25.9771 4.08209 26.2277 4.18311C26.4783 4.28413 26.706 4.43257 26.8977 4.61989C27.0894 4.80721 27.2412 5.02972 27.3446 5.27462C27.448 5.51952 27.5008 5.78197 27.5 6.04688V9.40626M22 14.7813V33.5938M15.8125 14.7813L16.5 33.5938M28.1875 14.7813L27.5 33.5938" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="flex-1 bg-[#EDEBE4] p-5 text-center  rounded-[10px]">
        <div class="w-full mb-5 text-center">
          <span class="text-2xl uppercase font-secondary">total price</span>
        </div>
        <div class="w-full px-5">
          <div class="flex items-center justify-between mb-5">
            <p class="uppercase">Prices (VAT):</p>
            <span class="text-[#74642F]">$ 80.00</span>
          </div>
          <div class="flex items-center justify-between mb-5 pt-2 border-t border-[#a8a1a1]">
            <p class="uppercase">total:</p>
            <span class="text-[#74642F]">$ 50.00</span>
          </div>
          <button class="w-full h-14 rounded-[5px] flex justify-center items-center py-4 bg-[#BF5353] text-white">Payment</button>
        </div>
      </div>
    </div>
  </div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>