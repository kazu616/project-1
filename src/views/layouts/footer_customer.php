<?php include 'views/layouts/footer.php' ?>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
var swiper = new Swiper(".SwiperHead", {
    pagination: {
        el: ".swiper-pagination1",
        dynamicBullets: true,
    },
});
var swiper1 = new Swiper(".mySwiper", {
    slidesPerView: 7,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next_genre",
        prevEl: ".swiper-button-prev_genre",
    },
});

// search
let search_bar = document.getElementById("search");
let btn_search = document.getElementById("toggle-search");

btn_search.addEventListener("click", function() {
    btn_search.classList.add('hidden');
    search_bar.classList.remove('hidden');
})

document.addEventListener("click", (event) => {
    if (!search_bar.contains(event.target) && !event.target.closest("#toggle-search") && !event.target.closest(
            "#search")) {
        btn_search.classList.remove('hidden');
        search_bar.classList.add('hidden');
        console.log("Clicked outside of search box");
    }
});
// alert custome

function showAlert(message) {
    var alertElement = document.createElement('div');
    alertElement.classList.add('custom-alert');
    alertElement.innerHTML = '<p>' + message + '</p>';
    document.body.appendChild(alertElement);
    setTimeout(function() {
        alertElement.remove();
    }, 1500);
}

function showAlert_warring(message) {
    var alertElement = document.createElement('div');
    alertElement.classList.add('custom-alert_deleted');
    alertElement.innerHTML = '<p>' + message + '</p>';
    document.body.appendChild(alertElement);
    setTimeout(function() {
        alertElement.remove();
    }, 1500);
}
// check if the URL contains the added_to_cart parameter
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('added_to_cart')) {
    showAlert('Product added to cart successfully!');
}
const urlParams1 = new URLSearchParams(window.location.search);
if (urlParams.has('deleted_from_cart')) {
    showAlert_warring('Deleted product successfully!');
}
// add event listener for the Add To Cart button
let btns_add_to_cart = document.querySelectorAll('.add_to_cart_ShopPage');
btns_add_to_cart.forEach(function(btn_add) {
    btn_add.addEventListener('click', function(event) {
        event.preventDefault(); // prevent page reload
        window.location.href = btn_add.getAttribute('href'); // redirect to landing page
    });
});
</script>