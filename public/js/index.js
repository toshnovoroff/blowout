/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/index.js ***!
  \*******************************/
// Развертка меню
burgerBtn.onclick = function () {
  if (document.getElementById('burgerNavList').className == 'burger-nav-bottom-open') {
    burgerNavList.classList.toggle('burger-nav-bottom');
  } else {
    burgerNavList.classList.toggle('burger-nav-bottom-open');
  }
};
/******/ })()
;