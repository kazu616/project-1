<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/output.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <title>Booksaw</title>
</head>

<body>
  <?php include '../layouts/header1.php' ?>
  <?php include '../layouts/header2.php' ?>
  <div class="mt-10 swiper mySwiper">
    <div class="swiper-wrapper">
      <?php for ($i = 1; $i <= 5; $i++) { ?>
        <div class="swiper-slide">
          <div class="container flex items-center gap-x-[200px] px-40">
            <div class="flex-1">
              <h1 class="mb-4 font-secondary text-7xl">Life of the wild</h1>
              <p class="text-[#7A7A7A] mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis urna, a eu.</p>
              <button class="px-5 py-3 uppercase bg-transparent border border-[#C0C0C0]">Read More</button>
            </div>
            <div>
              <img src="../../../public/imgs/book.png" class="w-[300px]" alt="">
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="swiper-button-next1 right-16">
      <svg width="28" height="14" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20.1324 0.445312L18.4832 1.88002L23.4999 6.14724H0V8.14127H23.4999L18.4843 12.4095L20.1324 13.8432L28 7.14425L20.1324 0.445312Z" fill="#333333" />
      </svg>
    </div>
    <div class="swiper-button-prev1 left-16">
      <svg width="28" height="14" viewBox="0 0 28 14" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.8705 0.445312L0 7.14425L7.8705 13.8432L9.51721 12.4095L4.50328 8.14127H28V6.14724H4.50211L9.51721 1.87902L7.8705 0.445312Z" fill="#333333" />
      </svg>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  <div class="mt-20"></div>
  <div class="bg-[#EDEBE4] w-full min-h-[200px] flex justify-center items-center">
    <div class="container flex items-center gap-x-[80px] justify-center">
      <img src="../../../public/imgs/associate1.png" class="w-[225px] object-cover" alt="">
      <img src="../../../public/imgs/associate2.png" class="w-[225px] object-cover" alt="">
      <img src="../../../public/imgs/associate3.png" class="w-[225px] object-cover" alt="">
      <img src="../../../public/imgs/associate4.png" class="w-[225px] object-cover" alt="">
      <img src="../../../public/imgs/associate5.png" class="w-[225px] object-cover" alt="">
    </div>
  </div>
  <div class="mt-40"></div>
  <?php include '../layouts/footer.php' ?>
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
  </script>
</body>

</html>