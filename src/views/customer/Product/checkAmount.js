const minusBtn = document.getElementById("minus");
const plusBtn = document.getElementById("plus");
const inputAmount = document.querySelector(".input_amount");
const total_amount = document.getElementById("totalProduct");
const add_to_cart = document.getElementById("add_to_cart");
const buy_now = document.getElementById("buy_now");
const data = document.getElementById("data");
const idPr = data.value;

inputAmount.addEventListener("blur", () => {
    if (inputAmount.value > parseInt(total_amount.textContent.trim())) {
        alert("Insufficient quantity in stock");
        inputAmount.value = 1;
    } else {
        data.setAttribute("name", inputAmount.value);
    }
});
minusBtn.addEventListener("click", () => {
    if (inputAmount.value > 1) {
        inputAmount.value = parseInt(inputAmount.value) - 1;
    }
});

plusBtn.addEventListener("click", () => {
    if (inputAmount.value < parseInt(total_amount.textContent.trim())) {
        inputAmount.value = parseInt(inputAmount.value) + 1;
    } else {
        alert("Insufficient quantity in stock");
    }
});

add_to_cart.addEventListener("click", (event) => {
    event.preventDefault();
    if (parseInt(total_amount.textContent.trim()) > 0) {
        window.location.href =
            "?controller=cart&action=add_to_cart&modeA=1&id=" +
            idPr +
            "&amount=" +
            inputAmount.value;
    }
});
buy_now.addEventListener("click", (event) => {
    event.preventDefault();
    if (parseInt(total_amount.textContent.trim()) > 0) {
        window.location.href =
            "?controller=cart&action=add_to_cart&modeA=1&id=" +
            idPr +
            "&amount=" +
            inputAmount.value;
    }
});
