<?php include_once 'views/layouts/head_admin.php' ?>
</head>

<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>
        <div class="content" style="flex-direction: column">
            <h3 class="title-table">
                Add Account
            </h3>
            <form class="form-basic" method="POST" action="index.php?controller=accountAdmin&action=add" autocomplete="off" enctype="multipart/form-data">
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
                    <?php foreach ($roles as $role) { ?>
                        <div class="form-radio">
                            <label for="role_admin"><?= $role['name'] ?></label>
                            <input type="radio" name="roles" value="<?= $role['idRole'] ?>" id="role_admin" />
                        </div>
                    <?php } ?>
                </div>
                <div class="form-field">
                    <label for="product-image">URL Image: </label>
                    <input type="file" required name="image" id="product-image">
                    <img class="preview_image" src="" alt="">
                </div>
                <div>
                </div>
                <button name="sbm" type="submit">
                    Add Account
                </button>
            </form>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>
</body>

</html>