/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./resources/js/products.js ***!
  \**********************************/
// Открытие фильтров
filterOpenBtn.onclick = function () {
  productsFilters.style.display = 'flex';
  filterOpenBtn.style.display = 'none';
};
filtersCloseBtn.addEventListener('click', function () {
  productsFilters.style.display = 'none';
  filterOpenBtn.style.display = 'block';
});

//Скрытие функции фильтра
var filters = document.querySelectorAll('.filter-option');
filters.forEach(function (filter) {
  var filterButton = filter.querySelector('.open-dropdown');
  filterButton.addEventListener('click', function () {
    filterButton.classList.toggle('open-dropdown--open');
    var filterOptions = filter.querySelector('.options');
    filterOptions.classList.toggle('options--close');
  });
});
/******/ })()
;