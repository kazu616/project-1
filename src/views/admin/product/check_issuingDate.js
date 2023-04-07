let issuingDate = document.getElementById("issuingDate");
let currentDate = new Date();
let message = document.getElementById("message");
issuingDate.addEventListener("change", function () {
    let selectedDate = new Date(issuingDate.value);
    if (selectedDate > currentDate) {
        message.innerText = "*Issuing date cannot be later than current date!";
    } else {
        console.log(selectedDate.toDateString());
        message.innerText = "";
    }
});
