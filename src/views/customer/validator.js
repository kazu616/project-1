function validator(options) {
    function validate(inputElement, rule) {
        var errorMessage = rule.test(inputElement.value);
        var errorElement = inputElement.parentElement.querySelector(
            options.errorSelector
        );
        if (errorMessage) {
            errorElement.innerText = errorMessage;
        } else {
            errorElement.innerText = "";
        }
    }
    var formElement = document.querySelector(options.form);
    var formElement_signup = document.querySelector(options.form_signup);
    if (formElement) {
        console.log(formElement);
        options.rules.forEach(function (rule) {
            var inputElement = formElement.querySelector(rule.selector);
            if (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                };
                inputElement.oninput = function () {
                    var errorElement = inputElement.parentElement.querySelector(
                        options.errorSelector
                    );
                    errorElement.innerText = "";
                };
            }
        });
    }
}
validator.isEmail = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : "Email không hợp lệ";
        },
    };
};
validator.isPassword = function (selector, min) {
    return {
        selector: selector,
        test: function (value) {
            console.log(value);
            return value.trim()
                ? value.length >= min
                    ? undefined
                    : "Mật khẩu tối thiểu 6 ký tụ"
                : "Vui lòng nhập trường này";
        },
    };
};
