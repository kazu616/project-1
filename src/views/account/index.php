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
    <div class="w-[230px]">
      <div class="flex items-center mb-10 gap-x-2">
        <div class="w-[90px] h-[90px]">
          <img src="imgs/avt.png" class="object-cover w-full h-full rounded-full" alt="">
        </div>
        <div class="flex flex-col">
          <h3 class="text-lg font-bold">customer</h3>
          <div class="text-sm text-[#888888]">
            <i class="fa-regular fa-pen-to-square"></i>
            <span>Edit Here</span>
          </div>
        </div>
      </div>
      <ul class="flex flex-col gap-2 text-lg font-medium">
        <li class="flex items-center cursor-pointer gap-x-5">
          <i class="text-xl fa-regular fa-user"></i>
          <span>My Account</span>
        </li>
        <li class="flex items-center text-red-500 cursor-pointer gap-x-5">
          <i class="text-xl fa-solid fa-list"></i>
          <span>My Order</span>
        </li>
      </ul>
    </div>
    <div class="flex-1 rounded-[10px] bg-[#EDEBE4] min-h-[500px] pl-10 py-5">
      <div class="pb-2 border-b border-[#BCBCBC]">
        <h2 class="text-2xl font-medium text-red-500">My Profile</h2>
        <p class="">Manage profile information for account security</p>
      </div>
      <div class="flex items-start px-10 mt-5 gap-x-10">
        <div class="flex flex-col flex-1 gap-5 pr-5 border-r border-[#BCBCBC]">
          <div class="flex items-center justify-between">
            <span>Username</span>
            <input type="text" class="px-5 py-2 rounded-[10px] min-w-[320px]">
          </div>
          <div class="flex items-center justify-between">
            <span>Email</span>
            <input type="text" class="px-5 py-2 rounded-[10px] min-w-[320px]">
          </div>
          <div class="flex items-center justify-between">
            <span>Phone Number</span>
            <input type="text" class="px-5 py-2 rounded-[10px] min-w-[320px]">
          </div>
          <div class="flex justify-between">
            <span>Address</span>
            <textarea class="px-5 py-2 rounded-[10px] min-w-[320px] min-h-[150px] resize-none"></textarea>
          </div>
          <button class="px-5 py-2 bg-[#FFA800] text-white font-semibold self-start rounded-[10px]">Save</button>
        </div>
        <div class="w-[200px] mt-2 flex flex-col justify-center">
          <img src="imgs/avt.png" class="object-cover w-[150px] mx-auto rounded-full" alt="">
          <input type="file" id="avatar_img" class="hidden">
          <button class="px-10 py-2 bg-[#BEBEBE] text-white rounded-[10px] mt-5 uppercase">Uploading</button>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-10"></div>
  <?php include 'views/layouts/footer.php' ?>
  <script src="js/test.js"></script>
</body>

</html>