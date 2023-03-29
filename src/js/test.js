const popup = document.querySelector("#popup");
const popup_overlay = document.querySelector("#popup_overlay");
const btn_popup = document.querySelector("#btn_popup");
const btn_close = document.querySelector("#btn_close");
const img_cart_empty = document.querySelector("#img_cart_empty");

btn_popup.addEventListener("click", () => {
  popup_overlay.classList.remove("hidden");
});

btn_close.addEventListener("click", () => {
  popup_overlay.classList.add("hidden");
});

document.addEventListener("click", (e) => {
  if (e.target.matches("#popup_overlay")) {
    popup_overlay.classList.add("hidden");
  }
});

if (img_cart_empty !== null) {
  Toastify({
    text: "Your cart is empty. Please add product to cart!",
    duration: 3000,
    newWindow: true,
    close: false,
    gravity: "top", // `top` or `bottom`
    position: "right", // `left`, `center` or `right`
    stopOnFocus: true, // Prevents dismissing of toast on hover
    style: {
      background: "rgb(248 113 113)",
    },
    onClick: function () {}, // Callback after click
  }).showToast();
}
