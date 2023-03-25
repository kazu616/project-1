const popup = document.querySelector("#popup");
const popup_overlay = document.querySelector("#popup_overlay");
const btn_popup = document.querySelector("#btn_popup");
const btn_close = document.querySelector("#btn_close");
const cus_name = document.querySelector("#cus_name");
const phone_number = document.querySelector("#phone_number");
const address = document.querySelector("#address");
const status = document.querySelector("#status");
const cus_name_session = document.querySelector("#cus_name_session");
const phone_number_session = document.querySelector("#phone_number_session");
const address_session = document.querySelector("#address");
const status_session = document.querySelector("#status_session");
const form_add_prod = document.querySelector("#form_add_prod");

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

form_add_prod.addEventListener("submit", (e) => {
  cus_name_session.value = cus_name.value;
  phone_number_session.value = phone_number.value;
  address_session.value = address.value;
  status_session.value = Number(status.value);
});
