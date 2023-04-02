<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'views/layouts/head_customer.php' ?>
  <title>Bill</title>
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
    <div class="flex-1 rounded-[10px]">
      <div class="flex items-center justify-between bg-[#EDEBE4] mb-10">
        <a href="#" class="flex items-center justify-center px-10 py-5 text-xl font-semibold text-red-500 uppercase border-b-2 border-red-500 cursor-pointer">All</a>
        <a href="#" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Pending</a>
        <a href="#" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Transport</a>
        <a href="#" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Complete</a>
        <a href="#" class="flex items-center justify-center px-10 py-5 text-xl font-semibold uppercase cursor-pointer">Cancelled</a>
      </div>
      <div class="flex flex-col w-full gap-x-5">
        <div class="w-full rounded-[20px] bg-white p-5">
          <div class="flex justify-end uppercase gap-x-5 border-b border-[#888888] pb-3 mb-5">
            <div class="flex gap-x-2 pr-5 border-r border-[#888888]">
              <p>bill of lading code:</p>
              <span class="text-red-500">230301AS0HEQP1</span>
            </div>
            <div class="flex gap-x-2">
              <p>Status:</p>
              <span class="text-[#61FF00]">Complete</span>
            </div>
          </div>
          <div class="h-[150px] px-3 flex justify-between items-end pb-3 border-b border-[#888] mb-3">
            <div class="flex h-full gap-x-4">
              <img src="imgs/best-selling.png" class="object-cover h-full" alt="">
              <div class="flex flex-col justify-between py-3">
                <div class="text-center">
                  <h3 class="text-lg uppercase">Way of happies</h3>
                  <p class="text-sm text-[#dacfcf]">Ananda Kumar</p>
                </div>
                <span>Amount: 1</span>
              </div>
            </div>
            <div class="flex items-center py-3 gap-x-3">
              <p class="text-[#888]">Price:</p>
              <span>$ 80.00</span>
            </div>
          </div>
          <div class="flex items-center justify-between mb-5 text-xl">
            <p class="text-[#888888]">Created Day: 20/10/2023</p>
            <div class="flex items-center gap-x-3">
              <p class="text-[#888]">Total:</p>
              <span class="text-red-500">$ 80.00</span>
            </div>
          </div>
          <div class="flex justify-end">
            <button class="px-3 py-2 bg-[#FF6B00] text-white font-semibold rounded-[10px]">Received The
              Confirme</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="mt-10"></div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>