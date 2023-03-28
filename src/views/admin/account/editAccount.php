<?php include_once 'views/layouts/head_admin.php' ?>

<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="content" style="flex-direction: column">
            <h3 class="title-table">
                Edit Account
            </h3>
            <?php foreach ($data_clone as $data_account) { ?>

            <form class="form-basic" method="POST" action="index.php?controller=accountAdmin&action=edit"
                autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" value="<?= $data_account['idAccount'] ?>" name="id" />
                <input type="hidden" value="<?= $data_account['img'] ?>" name="old_img" />
                <div class="form-field">
                    <input type="text" required value="<?= $data_account['name'] ?>" class="form-input" id="username"
                        name="username" placeholder=" " />
                    <label for="username" class="form-label">Username</label>
                </div>
                <div class="form-field">
                    <input type="text" required value="<?= $data_account['phoneNumber'] ?>" class="form-input"
                        id="phone_number" name="phone_number" placeholder=" " />
                    <label for="phone_number" class="form-label">Phone number</label>
                </div>
                <div class="form-field">
                    <input type="email" required value="<?= $data_account['email'] ?>" class="form-input" name="email"
                        id="email" placeholder=" " />
                    <label for="email" class="form-label">Email address</label>
                </div>
                <div class="form-field">
                    <input type="password" value="<?= $data_account['password'] ?>" required class="form-input"
                        name="password" id="password" placeholder=" " />
                    <label for="password" class="form-label">Password</label>
                    <box-icon name='low-vision' class="hide_eyes"></box-icon>
                </div>
                <div class="form-field">
                    <input type="text" value="<?= $data_account['address'] ?>" required class="form-input" id="address"
                        name="address" placeholder=" " />
                    <label for="address" class="form-label">Address</label>
                </div>
                <div class="form-roles">
                    <label>Roles:</label>
                    <div class="form-radio">
                        <label for="role_admin">Admin</label>
                        <input type="radio" name="roles" <?php if ($data_account['idRole'] == 1) {
                                                                    echo "checked";
                                                                } ?> value="1" id="role_admin" />
                    </div>
                    <div class="form-radio">
                        <label for="role_user">Customer</label>
                        <input type="radio" <?php if ($data_account['idRole'] == 2) {
                                                    echo "checked";
                                                } ?> name="roles" value="2" id="role_user" />
                    </div>
                </div>
                <div class="form-field">
                    <label for="product-image">URL Image: </label>
                    <input type="file" name="image" id="product-image">
                    <img class="preview_image" src="<?php echo "imgs/" . $data_account['img']; ?>" alt="">
                </div>
                <div>
                </div>
                <button name="sbm" type="submit">
                    Add Account
                </button>
                <!-- <?= isset($error) ? $error : "" ?> -->
            </form>
            <?php } ?>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>
</body>

</html>