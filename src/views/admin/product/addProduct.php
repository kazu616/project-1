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
        Add Product
      </h3>
      <form method="POST" class="form-basic" autocomplete="off" enctype="multipart/form-data">
        <div class="form-field">
          <input type="text" name="name" required class="form-input" placeholder=" " />
          <label class="form-label">Name</label>
        </div>
        <div class="form-field">
          <input type="number" name="price" required class="form-input" id="price" placeholder=" " />
          <label class="form-label">Price</label>
        </div>
        <div class="form-field">
          <input type="number" required class="form-input" name="amount" placeholder=" " />
          <label class="form-label">Amount</label>
        </div>
        <div class="form-field">
          <input type="text" required class="form-input" name="capacity" placeholder=" " />
          <label class="form-label">Capacity</label>
        </div>
        <div class="form-field">
          <input type="text" required class="form-input" name="phone_size" placeholder=" " />
          <label class="form-label">Phone size</label>
        </div>
        <div class="form-field">
          <input type="date" id="release_date_input" class="form-input" name="release_date" placeholder=" " />
          <label class="form-label">Release date</label>
        </div>
        <div class="form-field">
          <select name="categoryId" required>
            <option value="">Select category</option>
          </select>
        </div>
        <div class="form-field">
          <select name="manufacturerId" required>
            <option value="">Select manufacturer</option>
          </select>
        </div>
        <div class="form-field">
          <label for="product-image">URL Image: </label>
          <input type="file" name="image" id="product-image">
          <img class="preview_image" src=<?= isset($_GET["edit"]) ? "./uploads/$old_image" : "" ?> alt="">
        </div>
        <div class="form-field-hot">
          <label class="prod_hot">Feature post:</label>
          <label>
            <input type="checkbox" name="hot" class="check_hot" style="display: none;" />
            <div class="toggle_btn">
              <span></span>
            </div>
          </label>
        </div>
        <button name="sbm" type="submit">
          Add product
        </button>
      </form>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="js/main.js"></script>
</body>

</html>