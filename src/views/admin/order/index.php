<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/output.css">
  <link rel="stylesheet" href="css/admin.css">
  <title>Admin</title>
</head>

<body>
  <?php include_once "views/layouts/sidebar.php" ?>
  <main>
    <?php include_once "views/layouts/header_admin.php" ?>
    <div class="table">
      <h3>Orders</h3>
      <div class="flex items-center justify-between">
        <a href="?controller=orderAdmin&action=add">
          <button class="add-btn">Add order</button>
        </a>
        <form action="?controller=orderAdmin&action=search" method="POST">
          <div class="relative mb-5">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </div>
            <input type="search" name="search" id="default-search" value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" class="block w-[500px] pr-28 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by bill id....">
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
          </div>
        </form>
      </div>
      <table class="styled-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Bill code</th>
            <th>Created date</th>
            <th>Status</th>
            <th>Total Cost</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result['data'] as $each) { ?>
            <tr id="item_order">
              <td>
                <?= $each['idOrder'] ?>
              </td>
              <td>
                <?= $each['bill_code'] ?>
              </td>
              <td>
                <?= $each['createdDate'] ?>
              </td>
              <td>
                <?= $each['status'] == PENDING ? '<span class="px-5 py-3 text-white rounded-[5px] bg-orange-400">PENDING</span>' : ($each['status'] == DELIVERING ? '<span class="px-5 py-3 text-white bg-blue-400 rounded-[5px]">DELIVERING</span>' : ($each['status'] == COMPLETED ? '<span class="px-5 py-3 text-white bg-green-400 rounded-[5px]">COMPLETED</span>' : '<span class="px-5 py-3 rounded-[5px] text-white bg-red-400">CANCELED</span>')) ?>
              </td>
              <td>
                <?= $result[$each['idOrder']] ?>
              </td>
              <td>
                <button class="edit-btn !px-0 !py-0 <?= ($each['status'] == CANCELED || $each['status'] == COMPLETED) ? 'disabled' : '' ?>">
                  <a href="?controller=orderAdmin&action=edit&id=<?= $each['idOrder'] ?>" class="fill-white inline-block py-[10px] px-5 <?= ($each['status'] == CANCELED || $each['status'] == COMPLETED) ? 'disabled' : '' ?>" title="Edit Product">
                    <box-icon name="edit"></box-icon>
                  </a>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="pagination-container">
        <div class="flex items-center justify-center pagination">
          <a class="pagination-newer" href="?controller=orderAdmin&page=<?= $result['page'] == 1 ? 1 : $result['page'] - 1 ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><i class="fa-solid fa-arrow-left"></i></a>
          <span class="flex items-center pagination-inner gap-x-2">
            <?php if ($result['page'] >= 3) {   ?><a href="?controller=orderAdmin&page=1<?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>">1</a>
              <p class="px-4">...</p><?php } ?>
            <?php
            for ($i = $result['page'] != 1 ? $result['page'] - 1 : 1; $i <= ($result['page'] + 1 > $result['number_of_page'] ? $result['page'] : ($result['page'] + 1)); $i++) {
            ?>
              <a href="?controller=orderAdmin&page=<?= $i ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>" class=<?= isset($_GET["page"]) ? ($_GET["page"] == $i ? "pagination-active" : "") : ($i == 1 ? "pagination-active" : "") ?>><?= $i ?></a>
            <?php } ?>
          </span>
          <?php if ($result['page'] <= $result['number_of_page'] - 2) {   ?><p class="px-4">...</p>
            <a href="?controller=orderAdmin&page=<?= $result['number_of_page'] ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><?= $result['number_of_page'] ?></a><?php } ?>
          <a class="pagination-older" href="?controller=orderAdmin&page=<?= $result['page'] < $result['number_of_page'] ?  ($result['page'] + 1) : $result['page'] ?><?= isset($_GET['search']) ? "&search=" . $_GET['search'] : '' ?>"><i class="fa-solid fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
</body>

</html>