<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/admin.css">
  <title>Admin</title>
</head>

<body>
  <?php include_once "views/layouts/sidebar.php" ?>
  <main>
    <?php include_once "views/layouts/header_admin.php" ?>
    <div class="table">
      <h3>Users</h3>
      <a href="?controller=accountAdmin&action=add">
        <button class="add-btn">Add user</button>
      </a>
      <table class="styled-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone number</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Roles</th>
            <th>Actions</th>
          </tr>
        </thead>

      </table>
      <div class="pagination-container">
        <div class="pagination">
          <a class="pagination-newer" href="?pagelayout=user&page=<?= $page == 1 ? 1 : $page - 1 ?>">PREV</a>
          <span class="pagination-inner">
          </span>
          <a class="pagination-older" href="?pagelayout=user&page=<?= $page != $number_of_page ?  ($page + 1) : $page ?>">NEXT</a>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
</body>

</html>