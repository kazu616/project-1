window.onload = function () {
    // Get all the checkboxes by class name
    const checkboxes = document.getElementsByClassName("check");

    // Add an event listener to each checkbox
    Array.from(checkboxes).forEach(function (checkbox) {
        checkbox.addEventListener("change", function () {
            // Get all the checked checkboxes
            const checkedBoxes = document.querySelectorAll(".check:checked");

            // Create an empty array to hold the names of checked checkboxes
            let checkedId_product = [];
            // Loop through all the checked checkboxes, get their name attributes and push them into the checkedId_product array
            Array.from(checkedBoxes).forEach(function (checkedBox) {
                checkedId_product.push(checkedBox.name);
            });
            // Log the checkedId_product array to console
            console.log(checkedId_product);

            // Calculate the total value of the checked boxes

            let totalValue = 0;
            Array.from(checkedBoxes).forEach(function (checkedBox) {
                totalValue += parseInt(checkedBox.value);
            });

            // Show the total value of the checked boxes in a result div
            const resultDivs = document.querySelectorAll(".totalPrice");
            Array.from(resultDivs).forEach(function (resultDiv) {
                resultDiv.innerText = "$ " + totalValue.toFixed(2);
                resultDiv.setAttribute("value", "$ " + totalValue.toFixed(2));
            });

            // Set the value of the input tag with ID "idPr" to the value of the checkedId_product array
            const idPrInput = document.getElementById("idPr");
            idPrInput.value = checkedId_product.join(", ");

            // Check or uncheck the "All" checkbox based on the state of the other checkboxes
            const allCheckbox = document.getElementById("all-checkbox");
            if (checkedBoxes.length === checkboxes.length) {
                allCheckbox.checked = true;
            } else {
                allCheckbox.checked = false;
            }
        });
    });

    // Add an event listener to the "All" checkbox
    // Add an event listener to the "All" checkbox
    const allCheckbox = document.getElementById("all-checkbox");
    allCheckbox.addEventListener("change", function () {
        // Check or uncheck all other checkboxes based on the state of the "All" checkbox
        Array.from(checkboxes).forEach(function (checkbox) {
            checkbox.checked = allCheckbox.checked;
        });

        // Add all checkbox names to checkedId_product array if all checkboxes are checked
        let checkedId_product = [];
        if (allCheckbox.checked) {
            Array.from(checkboxes).forEach(function (checkbox) {
                checkedId_product.push(checkbox.name);
            });
        }
        // Log the checkedId_product array to console
        console.log(checkedId_product);

        // Calculate the total value of all checked boxes
        const checkedBoxes = document.querySelectorAll(".check:checked");
        let totalValue = 0;
        Array.from(checkedBoxes).forEach(function (checkedBox) {
            totalValue += parseInt(checkedBox.value);
        });

        // Show the total value of all checked boxes in a result div
        const resultDivs = document.querySelectorAll(".totalPrice");
        Array.from(resultDivs).forEach(function (resultDiv) {
            resultDiv.innerText = "$ " + totalValue.toFixed(2);
            resultDiv.setAttribute("value", totalValue);
        });

        // Update the value of the idPr input element based on the state of the "All" checkbox
        const idPrInput = document.getElementById("idPr");
        if (allCheckbox.checked) {
            // If the "All" checkbox is checked, set the value of the idPr input element to a comma-separated list of all checkbox names
            const checkboxNames = Array.from(checkboxes).map(function (
                checkbox
            ) {
                return checkbox.name;
            });
            idPrInput.value = checkboxNames.join(", ");
        } else {
            // If the "All" checkbox is unchecked, clear the value of the idPr input element
            idPrInput.value = "";
        }
    });
};
// document.addEventListener("DOMContentLoaded", change_amount);
function changeAmount(inputElem) {
    var amountNew = inputElem.value;
    var productId = inputElem.name;
    var amountLink = inputElem.nextElementSibling;

    var href =
        "?controller=cart&action=change_amount&amount=" +
        amountNew +
        "&mode=3&id=" +
        productId;

    amountLink.setAttribute("href", href);
    amountLink.click(); // redirect user to updated href location
}
