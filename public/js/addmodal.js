/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/addmodal.js ***!
  \**********************************/
function handleChange() {
  var input = document.querySelector('input[type="file"]');
  var span = document.querySelector('.input-file span');
  input.addEventListener('change', function () {
    span.textContent = input.files[0].name;
  });
}
handleChange();
addOpenBtn.addEventListener('click', function (e) {
  addModalCont.style.display = 'flex';
  body.classList.add('scroll-lock');
});
addModalCont.onclick = function (e) {
  e.stopPropagation();
  addModalCont.style.display = 'none';
  body.classList.remove('scroll-lock');
};
addCloseBtn.addEventListener('click', function (e) {
  e.stopPropagation();
  addModalCont.style.display = 'none';
  body.classList.remove('scroll-lock');
});
addModal.onclick = function (e) {
  e.stopPropagation();
};
document.addEventListener("DOMContentLoaded", function () {
  var addButton = document.querySelector('.add-button');
  addButton.addEventListener('click', function (event) {
    event.preventDefault(); // Prevent the default form submission behavior
    var form = document.querySelector('.aut-add-modal-form');
    form.submit(); // Manually trigger the form submission
  });
});
/******/ })()
;