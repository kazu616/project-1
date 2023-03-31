<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <a href="?controller=orderAdmin&action=add">
        <button class="add-btn">Add order</button>
      </a>
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
            <tr>
              <td><?= $each['idOrder'] ?></td>
              <td><?= $each['bill_code'] ?></td>
              <td><?= $each['createdDate'] ?></td>
              <td><?= $each['status'] == PENDING ? '<span class="px-5 py-3 text-white rounded-[5px] bg-orange-400">PENDING</span>' : ($each['status'] == DELIVERING ? '<span class="px-5 py-3 text-white bg-blue-400 rounded-[5px]">DELIVERING</span>' : ($each['status'] == COMPLETED ? '<span class="px-5 py-3 text-white bg-green-400 rounded-[5px]">COMPLETED</span>' : '<span class="px-5 py-3 rounded-[5px] text-white bg-red-400">CANCELED</span>')) ?>
              </td>
              <td><?= $result[$each['idOrder']] ?></td>
              <td>
                <button class="edit-btn <?= ($each['status'] == CANCELED || $each['status'] == COMPLETED) ? 'disabled' : '' ?>">
                  <a href="?controller=orderAdmin&action=edit&id=<?= $each['idOrder'] ?>" class="fill-white <?= ($each['status'] == CANCELED || $each['status'] == COMPLETED) ? 'disabled"' : '' ?>" title="Edit Product">
                    <box-icon name="edit"></box-icon>
                  </a>
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <div class="pagination-container">
        <div class="pagination">
          <a class="pagination-newer" href="?pagelayout=product&page=<?= $page == 1 ? 1 : $page - 1 ?>">PREV</a>
          <span class="pagination-inner">
          </span>
          <a class="pagination-older" href="?pagelayout=product&page=<?= $page != $number_of_page ?  ($page + 1) : $page ?>">NEXT</a>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
</body>

</html>