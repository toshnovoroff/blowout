/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/account.js":
/*!*********************************!*\
  !*** ./resources/js/account.js ***!
  \*********************************/
/***/ (() => {

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) arr2[i] = arr[i]; return arr2; }
function _iterableToArrayLimit(arr, i) { var _i = null == arr ? null : "undefined" != typeof Symbol && arr[Symbol.iterator] || arr["@@iterator"]; if (null != _i) { var _s, _e, _x, _r, _arr = [], _n = !0, _d = !1; try { if (_x = (_i = _i.call(arr)).next, 0 === i) { if (Object(_i) !== _i) return; _n = !1; } else for (; !(_n = (_s = _x.call(_i)).done) && (_arr.push(_s.value), _arr.length !== i); _n = !0); } catch (err) { _d = !0, _e = err; } finally { try { if (!_n && null != _i["return"] && (_r = _i["return"](), Object(_r) !== _r)) return; } finally { if (_d) throw _e; } } return _arr; } }
function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }
// Работа модального окна изменения данных пользователя
editOpenBtn.addEventListener('click', function (e) {
  bigEditModal.style.display = 'flex';
  body.classList.add('scroll-lock');
});
bigEditModal.onclick = function (e) {
  e.stopPropagation();
  bigEditModal.style.display = 'none';
  body.classList.remove('scroll-lock');
};
editCloseBtn.addEventListener('click', function (e) {
  e.stopPropagation();
  bigEditModal.style.display = 'none';
  body.classList.remove('scroll-lock');
});
minorEditModal.onclick = function (e) {
  e.stopPropagation();
};

// Развертка опций выбора пола
// sexButton.onclick = () => {
//     if (document.getElementById('minorEditModal').className==('edit-page-modal')){
//         sexButton.classList.toggle('input-box-arrow-open')
//         sexOptions.classList.toggle('sex-options-open')
//         minorEditModal.classList.remove('edit-page-modal')
//         minorEditModal.classList.add('edit-page-modal-low') 
//     } else{
//         sexButton.classList.toggle('input-box-arrow-open')
//         sexOptions.classList.toggle('sex-options-open')
//         minorEditModal.classList.remove('edit-page-modal-low')
//         minorEditModal.classList.add('edit-page-modal')
//     }
// }

// sexButton.addEventListener('click', function() {
//     if (sexOptions.style.display=='flex'){
//         sexOptions.style.display='none'
//     }
// })

//Выбор и замена пола
// const checkboxes = document.querySelectorAll(".box-box");
// const inputBoxText = document.querySelector(".input-box-text");

// for (let i = 0; i < checkboxes.length; i++) {
//   checkboxes[i].addEventListener('click', function() {
//     if (this.checked) {
//       for (let j = 0; j < checkboxes.length; j++) {
//         if (checkboxes[j] !== this) {
//           checkboxes[j].checked = false;
//         }
//       }
//       inputBoxText.innerText = this.name;
//     } else {
//       inputBoxText.innerText = 'Sex';
//     }
//   });
// }

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
      alert.style.color = 'red';
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

//Маска почты
var emailInput = document.querySelector('#eMail');
var emailAlert = document.createElement('span');
emailAlert.textContent = 'Please enter a valid email address';
emailAlert.style.color = 'red';
emailInput.insertAdjacentElement('afterend', emailAlert);
emailAlert.style.display = 'none';
emailInput.addEventListener('input', function () {
  if (this.value === '') {
    emailAlert.style.display = 'none';
    this.style.borderColor = 'black';
  } else if (this.value.includes('@')) {
    this.style.borderColor = 'black';
    emailAlert.style.display = 'none';
  } else {
    this.style.borderColor = 'red';
    emailAlert.style.display = 'block';
  }
});

// Работа модального окна с описанием услуги
// serviceOpenBtn.addEventListener('click', function() {
//     bigServiceModal.style.display='flex'
//     body.classList.add('scroll-lock')
// })

// bigServiceModal.onclick = (e) => {
//     e.stopPropagation();
//     bigServiceModal.style.display = 'none'
//     body.classList.remove('scroll-lock')
// }

// serviceCloseBtn.addEventListener('click', function(e) {
//     e.stopPropagation();
//     bigServiceModal.style.display='none'
//     body.classList.remove('scroll-lock')
// })

// minorServiceModal.onclick = (e) => {
//     e.stopPropagation();
// }

var editForm = document.querySelector('#editForm');
editForm.addEventListener('submit', function (e) {
  e.preventDefault();

  // Perform AJAX request to update account info
  var formData = new FormData(this);
  var url = this.getAttribute('action');
  var method = this.getAttribute('method');
  fetch(url, {
    method: method,
    body: formData
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    // Handle response data (e.g., display success message)
    console.log(data);
  })["catch"](function (error) {
    // Handle error (e.g., display error message)
    console.error(error);
  });
});

/***/ }),

/***/ "./resources/sass/product.sass":
/*!*************************************!*\
  !*** ./resources/sass/product.sass ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/products.sass":
/*!**************************************!*\
  !*** ./resources/sass/products.sass ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/reviews.sass":
/*!*************************************!*\
  !*** ./resources/sass/reviews.sass ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/style.sass":
/*!***********************************!*\
  !*** ./resources/sass/style.sass ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/index.sass":
/*!***********************************!*\
  !*** ./resources/sass/index.sass ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/account.sass":
/*!*************************************!*\
  !*** ./resources/sass/account.sass ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/auth.sass":
/*!**********************************!*\
  !*** ./resources/sass/auth.sass ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/booking.sass":
/*!*************************************!*\
  !*** ./resources/sass/booking.sass ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./resources/sass/loyalty.sass":
/*!*************************************!*\
  !*** ./resources/sass/loyalty.sass ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/account": 0,
/******/ 			"css/app": 0,
/******/ 			"css/loyalty": 0,
/******/ 			"css/booking": 0,
/******/ 			"css/auth": 0,
/******/ 			"css/account": 0,
/******/ 			"css/index": 0,
/******/ 			"css/style": 0,
/******/ 			"css/reviews": 0,
/******/ 			"css/products": 0,
/******/ 			"css/product": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/js/account.js")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/index.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/account.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/auth.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/booking.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/loyalty.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/product.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/products.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/reviews.sass")))
/******/ 	__webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/style.sass")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["css/app","css/loyalty","css/booking","css/auth","css/account","css/index","css/style","css/reviews","css/products","css/product"], () => (__webpack_require__("./resources/sass/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;