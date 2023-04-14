<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="image/x-icon" href="./imgs/logo.png">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booksaw</title>
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#161E31]">
    <div class="w-[1536px] h-[864px] relative overflow-hidden rounded-[27.2px] bg-white border-[8px] border-white mx-auto transform translate-y-[3.5%]" style="box-shadow: 0px 0px 36px 0 #e1c2a8">
        <div class="w-[723.2px] h-[823.36px]">
            <!-- khoi form -->
            <div class="flex flex-col justify-center items-center w-[723.2px] h-[631.328px] absolute left-[-30px] top-0 gap-5">
                <!-- logo -->
                <p class="text-[36.8px] text-left uppercase text-[#0a0a0a] mb-2">
                    <span class="text-[36.8px] font-bold text-left uppercase text-[#0a0a0a]">Book</span><span class="text-[36.8px] font-light text-left uppercase text-[#0a0a0a]">saw</span>
                </p>

                <div class="flex flex-col justify-start items-start gap-6.4">
                    <div>
                        <p class="w-[400px] text-[30px] font-bold text-center text-neutral-600 mb-5">
                            Create an Account
                        </p>
                    </div>
                    <!-- nút google -->
                    <button class="flex justify-center items-center w-[400px] relative gap-[10.4px] p-2 rounded-[4px] border border-[#e8e8e8] text-[0.8rem] font-bold text-left text-[#828282]">
                        <span><img src="./imgs/image-2.png" class="w-[20px] h-[20px] rounded-[8px] object-cover" /></span>Continue with Google
                    </button>
                </div>

                <p class="text-xs font-semibold text-left text-[#ddd]">
                    ------------- or Sign in with Email -------------
                </p>
                <div class="flex flex-col justify-start items-start h-[19rem] gap-6">
                    <form class="flex flex-col items-start justify-start gap-5" id="form_signup" onsubmit="return validate_signup()" method="POST" action="index.php?controller=user&action=signupAccess">
                        <!-- email -->
                        <div class="flex flex-col gap-1">
                            <label for="email_signup" class="text-[0.8rem] font-semibold text-left text-[#828282]">Email</label>
                            <input id="email" required type="text" name="email_signup" placeholder="mail@abc.com" class="w-[400px] px-2.5 py-[13px] rounded-[5px] border border-[#ded2d9] text-[0.8rem] text-left text-[#000000]" />
                            <span class="form-message text-[12px] text-red-400"></span>
                        </div>
                        <!-- phone -->
                        <div class="relative flex flex-col gap-1">
                            <label for="phoneNumber" class="text-[0.8rem] font-semibold text-left text-[#828282]">Phone
                                Number</label>
                            <input id="phone" type="number" required placeholder="+84" name="phoneNumber" class="w-[400px] px-2.5 py-[13px] rounded-[5px] border border-[#ded2d9] text-[0.8rem] text-left text-black appearance-none focus:outline-none" />
                            <span id="charCount" class="absolute top-10 right-4 text-[#a5a5a5] text-xs"></span>
                            <span class="form-message text-[12px] text-red-400 "></span>
                        </div>
                        <!-- password -->
                        <div class="flex flex-col gap-1">
                            <label for="password_signup" class="text-[0.8rem] font-semibold text-left text-[#828282]">Password</label>
                            <input id="password" required type="password" placeholder="******************" name="password_signup" class="w-[400px] px-2.5 py-[13px] rounded-[5px] border border-[#ded2d9] text-[0.8rem] text-left text-black" />
                            <span class="form-message text-[12px] text-red-400"></span>
                        </div>
                        <!-- password again -->
                        <div class="flex flex-col gap-1">
                            <label for="password_confirmation" class="text-[0.8rem] font-semibold text-left text-[#828282]">
                                Enter The Password
                            </label>
                            <input id="password_confirmation" required type="password" placeholder="******************" name="password_confirmation" class="w-[400px] px-2.5 py-[13px] rounded-[5px] border border-[#ded2d9] text-[0.8rem] text-left text-black" />
                            <span class="form-message text-[12px] text-red-400"></span>
                        </div>
                        <input name="signup" type="submit" class="text-center w-[400px] px-2.5 pt-[13px] pb-3 rounded-md bg-[#7f265b] text-[0.8rem] font-bold text-white cursor-pointer hover:bg-black" value="Sign Up" />
                    </form>
                    <div class="mx-auto mt-5">
                        <label class="text-sm text-left text-[#828282]">
                            You have a account?
                        </label>
                        <a href="?controller=user&action=login" class="text-base font-semibold text-left text-[#7f265b] hover:text-black">
                            Sign in here
                        </a>
                    </div>
                </div>
            </div>
            <!-- img -->
            <div class="w-[936.632px] h-[885.088px] absolute left-[680.5px] bg-[#161e31]">
                <div class="absolute mx-auto translate-x-[50%] translate-y-[900%]">
                    <p class="text-[32px] font-bold mx-auto text-[#73114b]">
                        Turn your ideas into reality.
                    </p>
                    <p class="text-[20px] font-semibold mx-auto text-[#73114b]">
                        Start shopping for free and get great booksaw deals
                    </p>
                </div>

                <img src="./imgs/sign_up.png" alt="" class="absolute translate-x-[30%] translate-y-[35%] w-[60%]" />
                <img src="./imgs/bg-sign_up.png" alt="" class="" />
            </div>
        </div>
    </div>
</body>
<script src="./views/customer/validator.js"></script>
<script>
    const phone = document.getElementById('phone');
    const charCount = document.getElementById('charCount');
    phone.addEventListener('input', () => {
        const maxLength = 10;
        const currentLength = phone.value.toString().length;
        charCount.innerText = `${currentLength}/${maxLength}`;

        if (currentLength >= maxLength) {
            phone.value = phone.value.substring(0, maxLength);
            phone.blur();
        }
    });
    validator({
        form: "#form_signup",
        errorSelector: ".form-message",
        rules: [
            validator.isEmail("#email"),
            validator.isPassword("#password", 6),
            validator.isPhone('#phone', 10),
            validator.isConfirmation("#password_confirmation", function() {
                return document.querySelector('#form_signup #password').value;
            }, 'Mật khẩu nhập lại không đúng'),
        ],
    });
</script>

</html>