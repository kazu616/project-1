function validator(options) {
  function validate(inputElement, rule) {
    var errorMessage = rule.test(inputElement.value);
    var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
    if (errorMessage) {
      errorElement.innerText = errorMessage;
    } else {
      errorElement.innerText = "";
    }
  }
  var formElement = document.querySelector(options.form);
  if (formElement) {
    // formElement.onsubmit = function (e) {
    //     //         e.preventDefault();
    //     //         options.rules.forEach(function (rule) {
    //     //             var inputElement = formElement.querySelector(rule.selector);
    //     //             validate(inputElement, rule);
    //     //         });
    // };
    options.rules.forEach(function (rule) {
      var inputElement = formElement.querySelector(rule.selector);
      console.log(inputElement);
      if (inputElement) {
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };
        inputElement.oninput = function () {
          var errorElement = inputElement.parentElement.querySelector(options.errorSelector);
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
      return regex.test(value) ? undefined : "Invalid email!";
    },
  };
};
validator.isPassword = function (selector, min) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim()
        ? value.length >= min
          ? undefined
          : "Password must be at least 6 characters!"
        : "Please enter this field!";
    },
  };
};
validator.isConfirmation = function (selector, getConfirmationValue, message) {
  return {
    selector: selector,
    test: function (value) {
      return value == getConfirmationValue() ? undefined : message || "Input value is incorrect!";
    },
  };
};
validator.isPhone = function (selector, max) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim()
        ? value.length <= max
          ? undefined
          : "Phone number need 10 numbers!"
        : "Please enter this field!";
    },
  };
};

function validate_login() {
  let email = document.forms["form_login"]["email_login"].value;
  let password = document.forms["form_login"]["password_login"].value;
  if (email == "" || password == "") {
    alert("Plese enter full values");
    return false;
  }
}
function validate_signup() {
  let email = document.forms["form_signup"]["email_signup"].value;
  let password = document.forms["form_signup"]["password_signup"].value;
  let phone = document.forms["form_signup"]["phoneNumber"].value;
  let password_cf = document.forms["form_signup"]["password_confirmation"].value;
  if (email == "" || password == "" || phone == "" || password_cf == "") {
    alert("Plese enter full values");
    return false;
  }
}
