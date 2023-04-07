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
</script>