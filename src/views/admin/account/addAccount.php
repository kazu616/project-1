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
    <div class="content" style="flex-direction: column">
      <h3 class="title-table">
        Add Account
      </h3>
      <form class="form-basic" method="POST" autocomplete="off">
        <div class="form-field">
          <input type="text" required class="form-input" id="username" name="username" placeholder=" " />
          <label for="username" class="form-label">Username</label>
        </div>
        <div class="form-field">
          <input type="text" required class="form-input" id="phone_number" name="phone_number" placeholder=" " />
          <label for="phone_number" class="form-label">Phone number</label>
        </div>
        <div class="form-field">
          <input type="email" required class="form-input" name="email" id="email" placeholder=" " />
          <label for="email" class="form-label">Email address</label>
        </div>
        <div class="form-field">
          <input type="password" required class="form-input" name="password" id="password" placeholder=" " />
          <label for="password" class="form-label">Password</label>
          <box-icon name='low-vision' class="hide_eyes"></box-icon>
        </div>
        <div class="form-field">
          <input type="text" required class="form-input" id="address" name="address" placeholder=" " />
          <label for="address" class="form-label">Address</label>
        </div>
        <div class="form-roles">
          <label>Roles:</label>
          <div class="form-radio">
            <label for="role_admin">Admin</label>
            <input type="radio" name="roles" value="admin" id="role_admin" />
          </div>
          <div class="form-radio">
            <label for="role_user">User</label>
            <input type="radio" name="roles" value="user" id="role_user" />
          </div>
        </div>
        <button name="sbm" type="submit">
          Add Account
        </button>
        <!-- <?= isset($error) ? $error : "" ?> -->
      </form>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
</body>

</html>