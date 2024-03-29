<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="./imgs/logo.png">
    <title>Booksaw</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FFE6C9]">
    <div class="w-[1536px] h-[864px] relative overflow-hidden rounded-[27.2px] bg-white border-[8px] border-white mx-auto transform translate-y-[3.5%]" style="box-shadow: 0px 0px 36px 0 #e1c2a8">
        <div class="w-[991.2px] h-[980px]">
            <!-- khối ảnh -->
            <div class="w-[887.2px] h-[864px] absolute left-[-0.4px] top-[-0.4px] bg-[#ffe6c9]">
                <img src="./imgs/login.png" alt="" class="object-cover h-[97%]" />
                <svg width="133.6" height="65.6" viewBox="0 0 167 82" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute left-[815px] top-[780px] opacity-40" preserveAspectRatio="none">
                    <path opacity="1" d="M83.4999 167C129.616 167 167 129.616 167 83.5C167 37.3842 129.616 0 83.4999 0C37.3842 0 0 37.3842 0 83.5C0 129.616 37.3842 167 83.4999 167Z" fill="url(#paint0_linear_36_108)"></path>
                    <defs>
                        <linearGradient id="paint0_linear_36_108" x1="160.074" y1="116.862" x2="6.88778" y2="50.177" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#860752"></stop>
                            <stop offset="1" stop-color="#FFD9A8"></stop>
                        </linearGradient>
                    </defs>
                </svg>
                <p class="absolute left-[236px] top-[730px] text-[32px] font-bold text-left text-[#73114b]">
                    Turn your ideas into reality.
                </p>
                <p class="absolute left-[209px] top-[774px] text-[20px] font-semibold text-left text-[#73114b]">
                    Start shopping for free and get great book deals
                </p>
            </div>
            <!-- khối form-->
            <div class="flex flex-col justify-center items-center absolute left-[1048px] top-[115px] gap-7">
                <div class="mb-10 text-[36.8px] uppercase text-[#0a0a0a]">
                    <p>
                        <span class="text-[36.8px] font-bold text-left uppercase text-[#0a0a0a]">Book</span><span class="text-[36.8px] font-light text-left uppercase text-[#0a0a0a]">saw</span>
                    </p>
                </div>
                <div class="text-start">
                    <h1 class="text-2xl font-bold text-neutral-600">
                        Login to your Account
                    </h1>
                    <p class="text-base text-neutral-600">
                        See what is going on with your business
                    </p>
                </div>
                <button class="w-[336px] p-2 rounded-[5px] border border-[#e8e8e8] flex justify-center items-center gap-[10px]">
                    <img src="./imgs/image-2.png" class="w-[20px] h-[20px] rounded-[8px] object-cover" />
                    <p class="text-sm font-bold text-[#828282]">
                        Continue with Google
                    </p>
                </button>
                <p class="text-xs font-semibold text-[#ddd] text-center mt-2">
                    ------------- or Sign in with Email -------------
                </p>
                <form class="flex flex-col items-start justify-start gap-6" onsubmit="return validate_login()" id="form_login" class="form" method="POST" action="index.php?controller=user&action=loginAccess">
                    <div class="flex flex-col items-start justify-start gap-2">
                        <label for="email_login" class="text-sm font-semibold text-left text-[#828282]">Email</label>
                        <input id="email_login" required type="email_login" name="email_login" placeholder="abc@mail.com" class="w-[336px] px-2 py-[10px] rounded-[5px] border border-[#ded2d9]" />
                        <span class="form-message text-[12px] text-red-400"></span>
                    </div>
                    <div class="flex flex-col items-start justify-start gap-2">
                        <label for="password_login" class="text-sm font-semibold text-left text-[#828282]">Password</label>
                        <input id="password_login" required type="password" name="password_login" placeholder="***************" class="w-[336px] px-2 py-[10px] rounded-[5px] border border-[#ded2d9]" />
                        <span class="form-message text-[12px] text-red-400"></span>
                    </div>
                    <input type="submit" class="w-[336px] px-2 py-2 rounded-md bg-[#7f265b] cursor-pointer text-white hover:bg-black duration-150" name="login" />
                </form>
            </div>
            <!-- đăng ký footer -->
            <div class="flex justify-center items-center absolute left-[1089.6px] top-[784px] gap-2">
                <p class="text-base text-left text-[#828282]">
                    Not Registered Yet?
                </p>
                <a href="?controller=user&action=signup" class="text-base font-semibold text-left text-[#7f265b]">
                    Create an account
                </a>
            </div>
        </div>
    </div>
</body>
<script src="./views/customer/validator.js"></script>
<script>
    validator({
        form: "#form_login",
        errorSelector: ".form-message",
        rules: [
            validator.isEmail("#email_login"),
            validator.isPassword("#password_login", 6),
        ],
    });
</script>

</html>