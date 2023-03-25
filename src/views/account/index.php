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
  <div class="container flex gap-x-[50px] h-[400px] mt-[100px]">
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
        <li class="flex items-center gap-x-5">
          <i class="text-xl fa-regular fa-user"></i>
          <span>My Account</span>
        </li>
        <li class="flex items-center gap-x-5">
          <i class="text-xl fa-solid fa-list"></i>
          <span>My Order</span>
        </li>
      </ul>
    </div>
    <div class="flex-1 min-h-[200px] bg-[#EDEBE4] rounded-[10px] p-6">
      <div class="px-5 pb-3 border-b border-b-[#BCBCBC] mb-2">
        <h2 class="text-2xl font-medium text-red-500">My Profile</h2>
        <p class="text-lg">Manage profile information for account security</p>
      </div>
      <div class="flex">
        <div class="flex items-center justify-between flex-1">
          <div></div>
        </div>
        <div class="w-[250px]"></div>
      </div>
    </div>
  </div>
  <?php include 'views/layouts/footer.php' ?>
</body>

</html>