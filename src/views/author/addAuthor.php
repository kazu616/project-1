    <h3>Add Author</h3>
    <form method="POST" class="form-advance" autocomplete="off" enctype="multipart/form-data"
        action="index.php?controller=authorAdmin&action=add">
        <div class="form-field">
            <input type="text" required value="" class="form-input" name="name" placeholder=" " />
            <label for="" class="form-label">Author name</label>
        </div>
        <div class="form-field">
            <input type="text" required value="" class="form-input" name="country" placeholder=" " />
            <label for="" class="form-label">Country name</label>
        </div>
        <div class="form-field">
            <label for="product-image">URL Image: </label>
            <input type="file" required name="image" id="product-image">
            <img class="preview_image" src="" alt="">
        </div>
        <button name="sbm">Add Author</button>
    </form>