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
    <div class="w-[230px] min-h-[200px]">
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
        <li class="flex items-center text-red-500 cursor-pointer gap-x-5">
          <i class="text-xl fa-regular fa-user"></i>
          <span>My Account</span>
        </li>
        <li class="flex items-center cursor-pointer gap-x-5">
          <i class="text-xl fa-solid fa-list"></i>
          <span>My Order</span>
        </li>
      </ul>
    </div>
    <div class="flex-1 bg-[#EDEBE4] rounded-[10px] p-6">
      <div class="px-5 pb-3 border-b border-b-[#BCBCBC] mb-2">
        <h2 class="text-2xl font-medium text-red-500">My Profile</h2>
        <p class="text-lg">Manage profile information for account security</p>
      </div>
      <div class="flex mt-5 pb-[50px]">
        <div class="flex flex-col items-start flex-1 gap-5 pl-10 pr-5 border-r border-[#BCBCBC]">
          <div class="flex items-center justify-between w-full">
            <span class="font-bold">Username</span>
            <input type="text" value="customer" class="min-w-[320px] py-3 rounded-[10px] px-2" placeholder="Username" name="username">
          </div>
          <div class="flex items-center justify-between w-full">
            <span class="font-bold">Email</span>
            <input type="text" value="customer" class="min-w-[320px] py-3 rounded-[10px] px-2" placeholder="Email" name="email">
          </div>
          <div class="flex items-center justify-between w-full">
            <span class="font-bold">Password</span>
            <input type="password" value="customer" class="min-w-[320px] py-3 rounded-[10px] px-2" placeholder="Password" name="password">
          </div>
          <div class="flex items-center justify-between w-full">
            <span class="font-bold">Phone Number</span>
            <input type="text" value="0923838283" class="min-w-[320px] py-3 rounded-[10px] px-2" placeholder="Phone number" name="phone_number">
          </div>
          <div class="flex items-start justify-between w-full">
            <span class="font-bold">Address</span>
            <textarea type="text" name="address" class="min-w-[320px] py-3 rounded-[10px] px-2 resize-none h-[150px]" placeholder="Address"></textarea>
          </div>
          <button class="px-5 py-2 bg-[#FFA800] text-white rounded-[10px]">Save</button>
        </div>
        <div class="w-[300px] flex items-center gap-y-5 flex-col">
          <img src="imgs/avt.png" class="w-[150px] h-[150px] rounded-full" alt="">
          <button class="px-10 py-2 uppercase bg-[#BEBEBE] font-semibold text-white rounded-[10px]">Uploading</button>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-10"></div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>