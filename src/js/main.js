const dropdownAvt = document.querySelector(".dropdown-avt");
const avt = document.querySelector(".avt");
const theme = document.querySelector(".moon");
const dashboardItem = document.querySelectorAll(".dashboard-item");
const r = document.querySelector(":root");
let lightTheme = JSON.parse(localStorage.getItem("theme"));
const toggle_btn = document.querySelector(".toggle_btn");
const circle = document.querySelector(".toggle_btn span");
const check_hot = document.querySelector(".check_hot");
const preview_image = document.querySelector(".preview_image");
const image_file = document.querySelector("#product-image");
const toggle_password = document.querySelector(".hide_eyes");
const queryString = window.location.search;
const page = queryString.split("=")[1];
let pre_url;
const search_bill_code = document.querySelector("#search_bill_code");
const input_search_bill = document.querySelector(".search-header");
const minus_amount_order = document.querySelector("#minus_amount_order");

if (search_bill_code && input_search_bill) {
  search_bill_code.addEventListener("click", () => {
    console.log("object");
    const value = input_search_bill.value;
    window.location = `?controller=orderAdmin&search=${value}`;
  });
}

if (lightTheme) {
  func_lightTheme();
} else {
  func_darkTheme();
}
if (queryString.includes("add_product")) {
  if (check_hot?.checked) {
    toggle_btn.classList.add("active_bg_toggle");
    circle.classList.add("active_toggle");
  }
}
if (queryString.includes("add_product")) {
  toggle_btn.addEventListener("click", () => {
    toggle_btn.classList.toggle("active_bg_toggle");
    circle.classList.toggle("active_toggle");
    console.log(check_hot.checked);
  });
}

function func_darkTheme() {
  r.style.setProperty("--main-background-light", "#28243d");
  r.style.setProperty("--main-text-light", "#cecbe3");
  r.style.setProperty("--secondary-background-light", "#312d4b");
  r.style.setProperty("--main-svg-light", "#cecbe3");
  r.style.setProperty("--hover-link", "#2f2c45");
}

function func_lightTheme() {
  r.style.setProperty("--main-background-light", "#f4f5fa");
  r.style.setProperty("--main-text-light", "#524e59");
  r.style.setProperty("--secondary-background-light", "#fff");
  r.style.setProperty("--main-svg-light", "#000");
  r.style.setProperty("--hover-link", "#ecedf3");
}

window.addEventListener("click", (e) => {
  if (dropdownAvt) {
    if (!e.target.matches(".avt img")) {
      dropdownAvt.classList.remove("active-avt");
    }
  }
});

if (avt) {
  avt.addEventListener("click", (e) => {
    console.log("object");
    dropdownAvt.classList.toggle("active-avt");
  });
}

if (theme) {
  theme.addEventListener("click", () => {
    lightTheme = !lightTheme;
    if (lightTheme) {
      func_lightTheme();
    } else {
      func_darkTheme();
    }
    localStorage.setItem("theme", lightTheme);
  });
}

if (image_file !== null) {
  image_file.addEventListener("change", (e) => {
    const url = URL.createObjectURL(e.target.files[0]);
    preview_image.src = url;
    console.log(url);
    if (pre_url !== null) {
      URL.revokeObjectURL(pre_url);
    }
    pre_url = url;
  });
}

if (toggle_password !== null) {
  toggle_password.addEventListener("click", (e) => {
    const input = e.target.parentNode.querySelector("input");
    if (input.type === "password") {
      input.type = "text";
    } else {
      input.type = "password";
    }
  });
}

$(".pagination-inner a").on("click", function () {
  $(this).siblings().removeClass("pagination-active");
  $(this).addClass("pagination-active");
});

if (minus_amount_order) {
  minus_amount_order.addEventListener("click", (e) => {
    const amount = Number(e.currentTarget.nextElementSibling.innerHTML);
    const id = Number(e.currentTarget.previousElementSibling.innerHTML);
    if (amount <= 1) {
      if (confirm("Do you want to delete this product?")) {
        window.location.href = `?controller=orderAdmin&action=changeAmount&id=${id}&func=minus`;
      }
    } else {
      window.location.href = `?controller=orderAdmin&action=changeAmount&id=${id}&func=minus`;
    }
    return;
  });
}
