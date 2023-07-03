/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/signup.js ***!
  \********************************/
function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
// Развертка опций выбора пола
sexButton.onclick = function () {
  if (document.getElementById('sexOptions').className == 'sex-option') {
    sexButton.classList.toggle('input-box-arrow-open');
    sexOptions.classList.toggle('sex-options-open');
  } else {
    sexButton.classList.toggle('input-box-arrow-open');
    sexOptions.classList.toggle('sex-options-open');
  }
};
sexButton.addEventListener('click', function () {
  if (sexOptions.style.display == 'flex') {
    sexOptions.style.display = 'none';
  }
});

//Выбор и замена пола
var checkboxes = document.querySelectorAll(".box-box");
var inputBoxText = document.querySelector(".input-box-text");
for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener('click', function () {
    if (this.checked) {
      for (var j = 0; j < checkboxes.length; j++) {
        if (checkboxes[j] !== this) {
          checkboxes[j].checked = false;
        }
      }
      inputBoxText.innerText = this.name;
    } else {
      inputBoxText.innerText = 'Sex';
    }
  });
}

//Маска даты
var bDate = document.querySelector('#bDate');
var alert = document.createElement('span');
alert.innerText = 'Invalid date format';
alert.style.display = 'none';
var alertContainer = document.createElement('div');
alertContainer.classList.add('alert-container');
alertContainer.appendChild(alert);
bDate.parentNode.insertBefore(alertContainer, bDate.nextSibling);
bDate.addEventListener('input', function (e) {
  var value = e.target.value;
  var lastChar = value[value.length - 1];
  if (isNaN(parseInt(lastChar))) {
    e.target.value = value.substring(0, value.length - 1);
  }
  if (value.length === 4 || value.length === 7) {
    e.target.value += '-';
  }
  if (value.length > 10) {
    e.target.value = value.substring(0, 10);
  }
  if (value.length === 10) {
    var _value$split = value.split('-'),
      _value$split2 = _slicedToArray(_value$split, 3),
      year = _value$split2[0],
      month = _value$split2[1],
      day = _value$split2[2];
    if (month > 12 || day > 31 || year.length > 4 || month.length > 2 || day.length > 2) {
      alert.style.display = 'inline';
      bDate.style.borderColor = '#ff0000';
    } else {
      alert.style.display = 'none';
      bDate.style.borderColor = '#000000';
    }
  }
  if (value.length === 0) {
    alert.style.display = 'none';
    bDate.style.borderColor = '#000000';
  }
});
/******/ })()
;