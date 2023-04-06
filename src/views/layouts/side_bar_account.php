<div class="w-[230px]">
  <div class="flex items-center mb-10 gap-x-5">
    <div class="w-[90px] h-[90px]">
      <img src="imgs/<?= $_SESSION['customer_img'] ?>" class="object-cover w-full h-full rounded-full" alt="">
    </div>
    <div class="flex flex-col">
      <h3 class="text-lg font-bold"><?= $_SESSION['customer_name'] ?></h3>
      <div class="text-sm text-[#888888]">
        <a href="?controller=account">
          <i class="fa-regular fa-pen-to-square"></i>
          <span>Edit Here</span>
        </a>
      </div>
    </div>
  </div>
  <ul class="flex flex-col gap-2 text-lg font-medium">
    <a href="?controller=account">
      <li class="flex items-center cursor-pointer gap-x-5 <?= $_GET["controller"] == "account" ? "text-red-500" : "" ?>">
        <i class="text-xl fa-regular fa-user"></i>
        <span>My Account</span>
      </li>
    </a>
    <a href="?controller=order_history">
      <li class="flex items-center cursor-pointer gap-x-5 <?= $_GET["controller"] == "order_history" ? "text-red-500" : "" ?>">
        <i class="text-xl fa-solid fa-list"></i>
        <span>My Order</span>
      </li>
    </a>
    <a href="?controller=user&action=logout">
      <li class="flex items-center cursor-pointer gap-x-5">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
      </li>
    </a>
  </ul>
</div>