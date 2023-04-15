<?php include_once 'views/layouts/head_admin.php' ?>


<body>
    <?php include_once "views/layouts/sidebar.php" ?>
    <main>
        <?php include_once "views/layouts/header_admin.php" ?>

        <div class="content" style="flex-direction: column">
            <h3 class="title-table">
                Add Product
            </h3>
            <form method="POST" class="form-basic" autocomplete="off" enctype="multipart/form-data" action="index.php?controller=productAdmin&action=add">
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
                    <input type="date" id="release_date_input" class="form-input" name="issuingDate" placeholder=" " />
                    <label class="form-label">Issuing Date</label>
                </div>
                <div class="form-field">
                    <select name="genre" required>
                        <option value="">Select Genre</option>
                        <?php
                        foreach ($array_genre_author['genres'] as $genre) {
                        ?>
                            <option value="<?= $genre['idGenre'] ?>">
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
                        foreach ($array_genre_author['authors'] as $author) {
                        ?>
                            <option value="<?= $author['idAuthor'] ?>">
                                <?= $author['name'] ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-field">
                    <textarea type="text" required class="!pt-4 form-input" style="height: 150px;" name="description" placeholder=" "></textarea>
                    <label class="form-label">Description</label>
                </div>
                <div></div>
                <div class="form-field">
                    <label for="product-image">URL Image: </label>
                    <input type="file" required name="image" id="product-image">
                    <img class="preview_image" src="" alt="">
                </div>
                <div></div>
                <button name="sbm" type="submit">
                    Add Account
                </button>
            </form>
        </div>
    </main>
    <?php include_once 'views/layouts/jsFooter_admin.php' ?>

</body>

</html>