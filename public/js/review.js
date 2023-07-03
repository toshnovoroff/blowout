/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/review.js ***!
  \********************************/
// Работа ползунка оценки при оставлении отзыва
var value = document.querySelector("#value");
var input = document.querySelector("#range");
value.textContent = input.value;
input.addEventListener("input", function (event) {
  value.textContent = event.target.value;
});

// Работа модального окна с оставлением отзывов
reviewOpenBtn.addEventListener('click', function () {
  bigReviewModal.style.display = 'flex';
  body.classList.add('scroll-lock');
});
bigReviewModal.onclick = function (e) {
  e.stopPropagation();
  bigReviewModal.style.display = 'none';
  body.classList.remove('scroll-lock');
};
reviewCloseBtn.addEventListener('click', function (e) {
  e.stopPropagation();
  bigReviewModal.style.display = 'none';
  body.classList.remove('scroll-lock');
});
minorReviewModal.onclick = function (e) {
  e.stopPropagation();
};
function handleChange() {
  var input = document.querySelector('input[type="file"]');
  var span = document.querySelector('.input-file span');
  input.addEventListener('change', function () {
    span.textContent = input.files[0].name;
  });
}
handleChange();
/******/ })()
;