<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="./imgs/logo.png">

    <title>Booksaw</title>
</head>

<body>
    <?php require_once 'views/layouts/header1.php' ?>
    <?php require_once 'views/layouts/header2.php' ?>
    <div class="container flex gap-x-[50px] items-start mt-[100px]">
        <?php include 'views/layouts/side_bar_account.php' ?>
        <div class="flex-1 rounded-[10px] bg-[#EDEBE4] min-h-[500px] pl-10 py-5">
            <div class="pb-2 border-b border-[#BCBCBC]">
                <h2 class="text-2xl font-medium text-red-500">My Profile</h2>
                <p class="">Manage profile information for account security</p>
            </div>
            <form action="?controller=account&action=update" method="POST" enctype='multipart/form-data'>
                <div class="flex items-start px-10 mt-5 gap-x-10">
                    <div class="flex flex-col flex-1 gap-5 pr-5 border-r border-[#BCBCBC]">
                        <div class="flex items-center justify-between">
                            <span>Username</span>
                            <input type="text" value="<?= $account['name'] ?>" name="name" class="px-5 py-2 rounded-[10px] min-w-[320px]">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Email</span>
                            <input type="email" value="<?= $account['email'] ?>" name="email" class="px-5 py-2 rounded-[10px] min-w-[320px]">
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Password</span>
                            <div class="relative min-w-[320px]">
                                <input type="password" value="<?= $account['password'] ?>" name="password" class="px-5 py-2 rounded-[10px] w-full pr-11">
                                <i class="absolute -translate-y-1/2 fa-regular fa-eye-slash top-1/2 right-3 hide_eyes"></i>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>Phone Number</span>
                            <input type="text" value="<?= $account['phoneNumber'] ?>" name="phone_number" class="px-5 py-2 rounded-[10px] min-w-[320px]">
                        </div>
                        <div class="flex justify-between">
                            <span>Address</span>
                            <textarea class="px-5 py-2 rounded-[10px] min-w-[320px] min-h-[150px] resize-none" name="address"><?= $account['address'] ?></textarea>
                        </div>
                        <button class="px-5 py-2 bg-[#FFA800] text-white font-semibold self-start rounded-[10px]" type="submit">Save</button>
                    </div>
                    <div class="w-[200px] mt-2 flex flex-col justify-center">
                        <img src="imgs/<?= $account['img'] ?>" class="preview_image object-cover h-[150px] w-[150px] mx-auto rounded-full" alt="">
                        <input type="file" id="product-image" name="image" class="hidden">
                        <input type="hidden" value="<?= $account['img'] ?>" name="old_img">
                        <button class="px-10 py-2 bg-[#BEBEBE] text-white rounded-[10px] mt-5 uppercase" type="button" id="upload_avtImg">Uploading</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <div class="mt-10"></div>
    <?php include 'views/layouts/footer_customer.php' ?>
    <script src="js/jquery.js"></script>
    <script src="js/test.js"></script>
    <script src="js/main.js"></script>
</body>

</html>