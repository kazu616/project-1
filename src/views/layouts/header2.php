<header class="container flex items-center justify-between py-4">
  <h1 class="text-3xl uppercase font-secondary">
    <a href="index.php">
      <span class="font-semibold">Book</span>
      <span>Saw</span>
    </a>
  </h1>
  <div class="flex gap-x-[60px] items-center">
    <div class="flex items-center uppercase gap-x-5">
      <a href="index.php" class="<?= isset($_GET['controller']) ? "" : "text-[#74642F]" ?>">Home</a>
      <a href="#">About</a>
      <a href="#">Pages</a>
      <a href="?controller=productCustomer" class="<?= isset($_GET['controller']) ? ($_GET['controller'] == "productCustomer" ? "text-[#74642F]" : "") : "" ?>">Shop</a>
      <a href="#">Articles</a>
      <a href="#subcribe">Contact</a>
    </div>
    <!-- <span>
      <i class="fa-solid fa-bars"></i>
    </span> -->
  </div>
</header>