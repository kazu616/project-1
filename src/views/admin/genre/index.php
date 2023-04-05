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
        <div class="flex-2">

            <div class="table" style="width: 2000px">
                <h3>Genres</h3>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Genre</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($row = mysqli_fetch_array($array['data'])) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $row["name"] ?></td>
                                <td>
                                    <a href="?controller=genreAdmin&edit=true&id=<?= $row['idGenre'] ?>">
                                        <button style="background: #000">
                                            <box-icon name="edit"></box-icon>
                                        </button>
                                    </a>
                                    <a href="?controller=genreAdmin&action=destroy&id=<?= $row['idGenre'] ?>" onclick="return confirm('Are you sure?');">
                                        <button type=" button">
                                            <box-icon type="solid" name="trash"></box-icon>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="content" style="flex-direction: column">
                <h3><?= isset($_GET['edit']) ? "Edit Genre" : "Add Genre" ?></h3>
                <form method="POST" class="form-advance" action="?controller=genreAdmin&action=<?= isset($_GET['edit']) ? "edit&id=" . $_GET['id'] : "add"  ?>" autocomplete="off">
                    <div class="form-field">
                        <input type="text" required value="<?= isset($_GET["id"]) ? $array['itemEdit']['name'] : "" ?>" class="form-input" id="product-genre" name="name" placeholder=" " />
                        <label for="product-genre" class="form-label">Genre name</label>
                    </div>
                    <button name="sbm"><?= isset($_GET['edit']) ? "Edit Genre" : "Add Genre" ?></button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="js/main.js"></script>
</body>

</html>