const popup = document.querySelector("#popup");
const popup_overlay = document.querySelector("#popup_overlay");
const btn_popup = document.querySelector("#btn_popup");
const btn_close = document.querySelector("#btn_close");

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
