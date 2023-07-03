/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/script.js ***!
  \********************************/
var swiper = new Swiper('.swiper', {
  spaceBetween: 40,
  freeMode: true,
  slidesPerView: 3,
  grabCursor: true,
  slidesOffsetBefore: 300
});
document.addEventListener("DOMContentLoaded", function () {
  var addToCartBtn = document.querySelector(".product-add-btn");
  addToCartBtn.addEventListener("click", addToCart);
  function addToCart(event) {
    var productId = event.target.getAttribute("data-product-id");
    var url = "/add-to-cart";
    var data = {
      product_id: productId
    };
    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": "{{ csrf_token() }}"
      },
      body: JSON.stringify(data)
    }).then(function (response) {
      return response.json();
    }).then(function (result) {
      console.log(result);
      // Handle the result as needed
    })["catch"](function (error) {
      console.error("Error:", error);
    });
  }
});
/******/ })()
;