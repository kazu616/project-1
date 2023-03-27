<?php include_once 'views/layouts/head_admin.php' ?>


<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>

        <div class="content" style="flex-direction: column">
            <h3 class="title-table">
                Edit Product
            </h3>
            <?php foreach ($data_clone['product'] as $data_product) { ?>
                <form method="POST" class="form-basic" autocomplete="off" enctype="multipart/form-data" action="index.php?controller=productAdmin&action=edit">
                    <input type="hidden" value="<?= $data_product['idProduct'] ?>" name="id" />
                    <input type="hidden" value="<?= $data_product['img'] ?>" name="old_img" />
                    <div class="form-field">
                        <input type="text" name="name" value="<?= $data_product['name'] ?>" required class="form-input" placeholder=" " />
                        <label class="form-label">Name</label>
                    </div>
                    <div class="form-field">
                        <input type="number" value="<?= $data_product['price'] ?>" name="price" required class="form-input" id="price" placeholder=" " />
                        <label class="form-label">Price</label>
                    </div>
                    <div class="form-field">
                        <input type="number" required value="<?= $data_product['amount'] ?>" class="form-input" name="amount" placeholder=" " />
                        <label class="form-label">Amount</label>
                    </div>
                    <div class="form-field">
                        <input type="date" id="release_date_input" value="<?= $data_product['issuingDate'] ?>" class="form-input" name="issuingDate" placeholder=" " />
                        <label class="form-label">Issuing Date</label>
                    </div>
                    <div class="form-field">
                        <select name="genre" required>
                            <option value="">Select Genre</option>
                            <?php
                            foreach ($data_clone['genres'] as $genre) {
                            ?>
                                <option value="<?= $genre['idGenre'] ?>" <?php if ($data_product['idGenre'] == $genre['idGenre']) {
                                                                                echo "selected";
                                                                            }  ?>>
                                    <?= $genre['name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <select name="author" required>
                            <option value="">Select Author</option>
                            <?php
                            foreach ($data_clone['authors'] as $author) {
                            ?>
                                <option value="<?= $author['idAuthor'] ?>" <?php if ($data_product['idAuthor'] == $author['idAuthor']) {
                                                                                echo "selected";
                                                                            }  ?>>
                                    <?= $author['name'] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-field">
                        <input type="text" required class="form-input" value="<?= $data_product['description'] ?>" style="height: 150px;" name="description" placeholder=" " />
                        <label class="form-label">Description</label>
                    </div>
                    <div></div>
                    <div class="form-field">
                        <label for="product-image">URL Image: </label>
                        <input type="file" name="image" id="product-image">
                        <img class="preview_image" src="<?php echo "imgs/" . $data_product['img']; ?>" alt="">
                    </div>
                    <div></div>
                    <button name="sbm" type="submit">
                        Edit Book
                    </button>
                </form>
            <?php } ?>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>

</body>

</html>