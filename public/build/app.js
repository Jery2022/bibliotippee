(self["webpackChunkbibliotippee"] = self["webpackChunkbibliotippee"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.index-of.js */ "./node_modules/core-js/modules/es.array.index-of.js");
/* harmony import */ var core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_index_of_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_join_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.join.js */ "./node_modules/core-js/modules/es.array.join.js");
/* harmony import */ var core_js_modules_es_array_join_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_join_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_array_splice_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.array.splice.js */ "./node_modules/core-js/modules/es.array.splice.js");
/* harmony import */ var core_js_modules_es_array_splice_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_splice_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.string.replace.js */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _bootstrap_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./bootstrap.js */ "./assets/bootstrap.js");
/* harmony import */ var _bootstrap_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_bootstrap_js__WEBPACK_IMPORTED_MODULE_6__);





/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
//import * as bootstrap from 'bootstrap'


//import bsCustomFileInput from 'bs-custom-file-input';
//bsCustomFileInput.init();

filterSelection('all'); // Execute the function and show all columns

function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName('columnFilter');
  if (c == 'all') c = '';
  // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
  for (i = 0; i < x.length; i++) {
    filterRemoveClass(x[i], 'showFilter');
    if (x[i].className.indexOf(c) > -1) filterAddClass(x[i], 'showFilter');
  }
}

// Show filtered elements
function filterAddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(' ');
  arr2 = name.split(' ');
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {
      element.className += ' ' + arr2[i];
    }
  }
}

// Hide elements that are not selected
function filterRemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(' ');
  arr2 = name.split(' ');
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);
    }
  }
  element.className = arr1.join(' ');
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById('myBtnContainer');
var btns = btnContainer.getElementsByClassName('btnFilter');
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener('click', function () {
    var current = document.getElementsByClassName('active');
    current[0].className = current[0].className.replace(' active', '');
    this.className += ' active';
  });
}
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

/***/ }),

/***/ "./assets/bootstrap.js":
/*!*****************************!*\
  !*** ./assets/bootstrap.js ***!
  \*****************************/
/***/ (() => {

/*  import { startStimulusApp } from '@symfony/stimulus-bundle';

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
*/

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_array_index-of_js-node_modules_core-js_modules_es_arr-08776a"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q2pCLENBQUMsQ0FBQyxDQUFDa0IsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFlBQVk7SUFDNUMsSUFBSUMsT0FBTyxHQUFHbEIsUUFBUSxDQUFDQyxzQkFBc0IsQ0FBQyxRQUFRLENBQUM7SUFDdkRpQixPQUFPLENBQUMsQ0FBQyxDQUFDLENBQUNkLFNBQVMsR0FBR2MsT0FBTyxDQUFDLENBQUMsQ0FBQyxDQUFDZCxTQUFTLENBQUNlLE9BQU8sQ0FBQyxTQUFTLEVBQUUsRUFBRSxDQUFDO0lBQ2xFLElBQUksQ0FBQ2YsU0FBUyxJQUFJLFNBQVM7RUFDN0IsQ0FBQyxDQUFDO0FBQ0o7QUFFQWdCLE9BQU8sQ0FBQ0MsR0FBRyxDQUFDLGdFQUFnRSxDQUFDOzs7Ozs7Ozs7O0FDN0Q3RTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7OztBQ0xBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vYmlibGlvdGlwcGVlLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly9iaWJsaW90aXBwZWUvLi9hc3NldHMvYm9vdHN0cmFwLmpzIiwid2VicGFjazovL2JpYmxpb3RpcHBlZS8uL2Fzc2V0cy9zdHlsZXMvYXBwLnNjc3M/OGY1OSJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxyXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXHJcbiAqXHJcbiAqIFRoaXMgZmlsZSB3aWxsIGJlIGluY2x1ZGVkIG9udG8gdGhlIHBhZ2UgdmlhIHRoZSBpbXBvcnRtYXAoKSBUd2lnIGZ1bmN0aW9uLFxyXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxyXG4gKi9cclxuLy9pbXBvcnQgKiBhcyBib290c3RyYXAgZnJvbSAnYm9vdHN0cmFwJ1xyXG5pbXBvcnQgJy4vc3R5bGVzL2FwcC5zY3NzJztcclxuaW1wb3J0ICcuL2Jvb3RzdHJhcC5qcyc7XHJcbi8vaW1wb3J0IGJzQ3VzdG9tRmlsZUlucHV0IGZyb20gJ2JzLWN1c3RvbS1maWxlLWlucHV0JztcclxuLy9ic0N1c3RvbUZpbGVJbnB1dC5pbml0KCk7XHJcblxyXG5maWx0ZXJTZWxlY3Rpb24oJ2FsbCcpOyAvLyBFeGVjdXRlIHRoZSBmdW5jdGlvbiBhbmQgc2hvdyBhbGwgY29sdW1uc1xyXG5cclxuZnVuY3Rpb24gZmlsdGVyU2VsZWN0aW9uKGMpIHtcclxuICB2YXIgeCwgaTtcclxuICB4ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnY29sdW1uRmlsdGVyJyk7XHJcbiAgaWYgKGMgPT0gJ2FsbCcpIGMgPSAnJztcclxuICAvLyBBZGQgdGhlIFwic2hvd1wiIGNsYXNzIChkaXNwbGF5OmJsb2NrKSB0byB0aGUgZmlsdGVyZWQgZWxlbWVudHMsIGFuZCByZW1vdmUgdGhlIFwic2hvd1wiIGNsYXNzIGZyb20gdGhlIGVsZW1lbnRzIHRoYXQgYXJlIG5vdCBzZWxlY3RlZFxyXG4gIGZvciAoaSA9IDA7IGkgPCB4Lmxlbmd0aDsgaSsrKSB7XHJcbiAgICBmaWx0ZXJSZW1vdmVDbGFzcyh4W2ldLCAnc2hvd0ZpbHRlcicpO1xyXG4gICAgaWYgKHhbaV0uY2xhc3NOYW1lLmluZGV4T2YoYykgPiAtMSkgZmlsdGVyQWRkQ2xhc3MoeFtpXSwgJ3Nob3dGaWx0ZXInKTtcclxuICB9XHJcbn1cclxuXHJcbi8vIFNob3cgZmlsdGVyZWQgZWxlbWVudHNcclxuZnVuY3Rpb24gZmlsdGVyQWRkQ2xhc3MoZWxlbWVudCwgbmFtZSkge1xyXG4gIHZhciBpLCBhcnIxLCBhcnIyO1xyXG4gIGFycjEgPSBlbGVtZW50LmNsYXNzTmFtZS5zcGxpdCgnICcpO1xyXG4gIGFycjIgPSBuYW1lLnNwbGl0KCcgJyk7XHJcbiAgZm9yIChpID0gMDsgaSA8IGFycjIubGVuZ3RoOyBpKyspIHtcclxuICAgIGlmIChhcnIxLmluZGV4T2YoYXJyMltpXSkgPT0gLTEpIHtcclxuICAgICAgZWxlbWVudC5jbGFzc05hbWUgKz0gJyAnICsgYXJyMltpXTtcclxuICAgIH1cclxuICB9XHJcbn1cclxuXHJcbi8vIEhpZGUgZWxlbWVudHMgdGhhdCBhcmUgbm90IHNlbGVjdGVkXHJcbmZ1bmN0aW9uIGZpbHRlclJlbW92ZUNsYXNzKGVsZW1lbnQsIG5hbWUpIHtcclxuICB2YXIgaSwgYXJyMSwgYXJyMjtcclxuICBhcnIxID0gZWxlbWVudC5jbGFzc05hbWUuc3BsaXQoJyAnKTtcclxuICBhcnIyID0gbmFtZS5zcGxpdCgnICcpO1xyXG4gIGZvciAoaSA9IDA7IGkgPCBhcnIyLmxlbmd0aDsgaSsrKSB7XHJcbiAgICB3aGlsZSAoYXJyMS5pbmRleE9mKGFycjJbaV0pID4gLTEpIHtcclxuICAgICAgYXJyMS5zcGxpY2UoYXJyMS5pbmRleE9mKGFycjJbaV0pLCAxKTtcclxuICAgIH1cclxuICB9XHJcbiAgZWxlbWVudC5jbGFzc05hbWUgPSBhcnIxLmpvaW4oJyAnKTtcclxufVxyXG5cclxuLy8gQWRkIGFjdGl2ZSBjbGFzcyB0byB0aGUgY3VycmVudCBidXR0b24gKGhpZ2hsaWdodCBpdClcclxudmFyIGJ0bkNvbnRhaW5lciA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdteUJ0bkNvbnRhaW5lcicpO1xyXG52YXIgYnRucyA9IGJ0bkNvbnRhaW5lci5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCdidG5GaWx0ZXInKTtcclxuZm9yICh2YXIgaSA9IDA7IGkgPCBidG5zLmxlbmd0aDsgaSsrKSB7XHJcbiAgYnRuc1tpXS5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcclxuICAgIHZhciBjdXJyZW50ID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZSgnYWN0aXZlJyk7XHJcbiAgICBjdXJyZW50WzBdLmNsYXNzTmFtZSA9IGN1cnJlbnRbMF0uY2xhc3NOYW1lLnJlcGxhY2UoJyBhY3RpdmUnLCAnJyk7XHJcbiAgICB0aGlzLmNsYXNzTmFtZSArPSAnIGFjdGl2ZSc7XHJcbiAgfSk7XHJcbn1cclxuXHJcbmNvbnNvbGUubG9nKCdUaGlzIGxvZyBjb21lcyBmcm9tIGFzc2V0cy9hcHAuanMgLSB3ZWxjb21lIHRvIEFzc2V0TWFwcGVyISDwn46JJyk7XHJcbiIsIi8qICBpbXBvcnQgeyBzdGFydFN0aW11bHVzQXBwIH0gZnJvbSAnQHN5bWZvbnkvc3RpbXVsdXMtYnVuZGxlJztcblxuY29uc3QgYXBwID0gc3RhcnRTdGltdWx1c0FwcCgpO1xuLy8gcmVnaXN0ZXIgYW55IGN1c3RvbSwgM3JkIHBhcnR5IGNvbnRyb2xsZXJzIGhlcmVcbi8vIGFwcC5yZWdpc3Rlcignc29tZV9jb250cm9sbGVyX25hbWUnLCBTb21lSW1wb3J0ZWRDb250cm9sbGVyKTtcbiovXG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiZmlsdGVyU2VsZWN0aW9uIiwiYyIsIngiLCJpIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwibGVuZ3RoIiwiZmlsdGVyUmVtb3ZlQ2xhc3MiLCJjbGFzc05hbWUiLCJpbmRleE9mIiwiZmlsdGVyQWRkQ2xhc3MiLCJlbGVtZW50IiwibmFtZSIsImFycjEiLCJhcnIyIiwic3BsaXQiLCJzcGxpY2UiLCJqb2luIiwiYnRuQ29udGFpbmVyIiwiZ2V0RWxlbWVudEJ5SWQiLCJidG5zIiwiYWRkRXZlbnRMaXN0ZW5lciIsImN1cnJlbnQiLCJyZXBsYWNlIiwiY29uc29sZSIsImxvZyJdLCJzb3VyY2VSb290IjoiIn0=