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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUMyQjtBQUNIOztBQUV4QjtBQUNBOztBQUVBQSxlQUFlLENBQUMsS0FBSyxDQUFDLENBQUMsQ0FBQzs7QUFFeEIsU0FBU0EsZUFBZUEsQ0FBQ0MsQ0FBQyxFQUFFO0VBQzFCLElBQUlDLENBQUMsRUFBRUMsQ0FBQztFQUNSRCxDQUFDLEdBQUdFLFFBQVEsQ0FBQ0Msc0JBQXNCLENBQUMsY0FBYyxDQUFDO0VBQ25ELElBQUlKLENBQUMsSUFBSSxLQUFLLEVBQUVBLENBQUMsR0FBRyxFQUFFO0VBQ3RCO0VBQ0EsS0FBS0UsQ0FBQyxHQUFHLENBQUMsRUFBRUEsQ0FBQyxHQUFHRCxDQUFDLENBQUNJLE1BQU0sRUFBRUgsQ0FBQyxFQUFFLEVBQUU7SUFDN0JJLGlCQUFpQixDQUFDTCxDQUFDLENBQUNDLENBQUMsQ0FBQyxFQUFFLFlBQVksQ0FBQztJQUNyQyxJQUFJRCxDQUFDLENBQUNDLENBQUMsQ0FBQyxDQUFDSyxTQUFTLENBQUNDLE9BQU8sQ0FBQ1IsQ0FBQyxDQUFDLEdBQUcsQ0FBQyxDQUFDLEVBQUVTLGNBQWMsQ0FBQ1IsQ0FBQyxDQUFDQyxDQUFDLENBQUMsRUFBRSxZQUFZLENBQUM7RUFDeEU7QUFDRjs7QUFFQTtBQUNBLFNBQVNPLGNBQWNBLENBQUNDLE9BQU8sRUFBRUMsSUFBSSxFQUFFO0VBQ3JDLElBQUlULENBQUMsRUFBRVUsSUFBSSxFQUFFQyxJQUFJO0VBQ2pCRCxJQUFJLEdBQUdGLE9BQU8sQ0FBQ0gsU0FBUyxDQUFDTyxLQUFLLENBQUMsR0FBRyxDQUFDO0VBQ25DRCxJQUFJLEdBQUdGLElBQUksQ0FBQ0csS0FBSyxDQUFDLEdBQUcsQ0FBQztFQUN0QixLQUFLWixDQUFDLEdBQUcsQ0FBQyxFQUFFQSxDQUFDLEdBQUdXLElBQUksQ0FBQ1IsTUFBTSxFQUFFSCxDQUFDLEVBQUUsRUFBRTtJQUNoQyxJQUFJVSxJQUFJLENBQUNKLE9BQU8sQ0FBQ0ssSUFBSSxDQUFDWCxDQUFDLENBQUMsQ0FBQyxJQUFJLENBQUMsQ0FBQyxFQUFFO01BQy9CUSxPQUFPLENBQUNILFNBQVMsSUFBSSxHQUFHLEdBQUdNLElBQUksQ0FBQ1gsQ0FBQyxDQUFDO0lBQ3BDO0VBQ0Y7QUFDRjs7QUFFQTtBQUNBLFNBQVNJLGlCQUFpQkEsQ0FBQ0ksT0FBTyxFQUFFQyxJQUFJLEVBQUU7RUFDeEMsSUFBSVQsQ0FBQyxFQUFFVSxJQUFJLEVBQUVDLElBQUk7RUFDakJELElBQUksR0FBR0YsT0FBTyxDQUFDSCxTQUFTLENBQUNPLEtBQUssQ0FBQyxHQUFHLENBQUM7RUFDbkNELElBQUksR0FBR0YsSUFBSSxDQUFDRyxLQUFLLENBQUMsR0FBRyxDQUFDO0VBQ3RCLEtBQUtaLENBQUMsR0FBRyxDQUFDLEVBQUVBLENBQUMsR0FBR1csSUFBSSxDQUFDUixNQUFNLEVBQUVILENBQUMsRUFBRSxFQUFFO0lBQ2hDLE9BQU9VLElBQUksQ0FBQ0osT0FBTyxDQUFDSyxJQUFJLENBQUNYLENBQUMsQ0FBQyxDQUFDLEdBQUcsQ0FBQyxDQUFDLEVBQUU7TUFDakNVLElBQUksQ0FBQ0csTUFBTSxDQUFDSCxJQUFJLENBQUNKLE9BQU8sQ0FBQ0ssSUFBSSxDQUFDWCxDQUFDLENBQUMsQ0FBQyxFQUFFLENBQUMsQ0FBQztJQUN2QztFQUNGO0VBQ0FRLE9BQU8sQ0FBQ0gsU0FBUyxHQUFHSyxJQUFJLENBQUNJLElBQUksQ0FBQyxHQUFHLENBQUM7QUFDcEM7O0FBRUE7QUFDQSxJQUFJQyxZQUFZLEdBQUdkLFFBQVEsQ0FBQ2UsY0FBYyxDQUFDLGdCQUFnQixDQUFDO0FBQzVELElBQUlDLElBQUksR0FBR0YsWUFBWSxDQUFDYixzQkFBc0IsQ0FBQyxXQUFXLENBQUM7QUFDM0QsS0FBSyxJQUFJRixDQUFDLEdBQUcsQ0FBQyxFQUFFQSxDQUFDLEdBQUdpQixJQUFJLENBQUNkLE1BQU0sRUFBRUgsQ0FBQyxFQUFFLEVBQUU7RUFDcENpQixJQUFJLENBQUNqQixDQUFDLENBQUMsQ0FBQ2tCLGdCQUFnQixDQUFDLE9BQU8sRUFBRSxZQUFZO0lBQzVDLElBQUlDLE9BQU8sR0FBR2xCLFFBQVEsQ0FBQ0Msc0JBQXNCLENBQUMsUUFBUSxDQUFDO0lBQ3ZEaUIsT0FBTyxDQUFDLENBQUMsQ0FBQyxDQUFDZCxTQUFTLEdBQUdjLE9BQU8sQ0FBQyxDQUFDLENBQUMsQ0FBQ2QsU0FBUyxDQUFDZSxPQUFPLENBQUMsU0FBUyxFQUFFLEVBQUUsQ0FBQztJQUNsRSxJQUFJLENBQUNmLFNBQVMsSUFBSSxTQUFTO0VBQzdCLENBQUMsQ0FBQztBQUNKO0FBRUFnQixPQUFPLENBQUNDLEdBQUcsQ0FBQyxnRUFBZ0UsQ0FBQzs7Ozs7Ozs7OztBQzlEN0U7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOzs7Ozs7Ozs7Ozs7QUNMQSIsInNvdXJjZXMiOlsid2VicGFjazovL2JpYmxpb3RpcHBlZS8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vYmlibGlvdGlwcGVlLy4vYXNzZXRzL2Jvb3RzdHJhcC5qcyIsIndlYnBhY2s6Ly9iaWJsaW90aXBwZWUvLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzPzhmNTkiXSwic291cmNlc0NvbnRlbnQiOlsiLypcclxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxyXG4gKlxyXG4gKiBUaGlzIGZpbGUgd2lsbCBiZSBpbmNsdWRlZCBvbnRvIHRoZSBwYWdlIHZpYSB0aGUgaW1wb3J0bWFwKCkgVHdpZyBmdW5jdGlvbixcclxuICogd2hpY2ggc2hvdWxkIGFscmVhZHkgYmUgaW4geW91ciBiYXNlLmh0bWwudHdpZy5cclxuICovXHJcbi8vaW1wb3J0ICogYXMgYm9vdHN0cmFwIGZyb20gJ2Jvb3RzdHJhcCdcclxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuc2Nzcyc7XHJcbmltcG9ydCAnLi9ib290c3RyYXAuanMnO1xyXG5cclxuLy9pbXBvcnQgYnNDdXN0b21GaWxlSW5wdXQgZnJvbSAnYnMtY3VzdG9tLWZpbGUtaW5wdXQnO1xyXG4vL2JzQ3VzdG9tRmlsZUlucHV0LmluaXQoKTtcclxuXHJcbmZpbHRlclNlbGVjdGlvbignYWxsJyk7IC8vIEV4ZWN1dGUgdGhlIGZ1bmN0aW9uIGFuZCBzaG93IGFsbCBjb2x1bW5zXHJcblxyXG5mdW5jdGlvbiBmaWx0ZXJTZWxlY3Rpb24oYykge1xyXG4gIHZhciB4LCBpO1xyXG4gIHggPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCdjb2x1bW5GaWx0ZXInKTtcclxuICBpZiAoYyA9PSAnYWxsJykgYyA9ICcnO1xyXG4gIC8vIEFkZCB0aGUgXCJzaG93XCIgY2xhc3MgKGRpc3BsYXk6YmxvY2spIHRvIHRoZSBmaWx0ZXJlZCBlbGVtZW50cywgYW5kIHJlbW92ZSB0aGUgXCJzaG93XCIgY2xhc3MgZnJvbSB0aGUgZWxlbWVudHMgdGhhdCBhcmUgbm90IHNlbGVjdGVkXHJcbiAgZm9yIChpID0gMDsgaSA8IHgubGVuZ3RoOyBpKyspIHtcclxuICAgIGZpbHRlclJlbW92ZUNsYXNzKHhbaV0sICdzaG93RmlsdGVyJyk7XHJcbiAgICBpZiAoeFtpXS5jbGFzc05hbWUuaW5kZXhPZihjKSA+IC0xKSBmaWx0ZXJBZGRDbGFzcyh4W2ldLCAnc2hvd0ZpbHRlcicpO1xyXG4gIH1cclxufVxyXG5cclxuLy8gU2hvdyBmaWx0ZXJlZCBlbGVtZW50c1xyXG5mdW5jdGlvbiBmaWx0ZXJBZGRDbGFzcyhlbGVtZW50LCBuYW1lKSB7XHJcbiAgdmFyIGksIGFycjEsIGFycjI7XHJcbiAgYXJyMSA9IGVsZW1lbnQuY2xhc3NOYW1lLnNwbGl0KCcgJyk7XHJcbiAgYXJyMiA9IG5hbWUuc3BsaXQoJyAnKTtcclxuICBmb3IgKGkgPSAwOyBpIDwgYXJyMi5sZW5ndGg7IGkrKykge1xyXG4gICAgaWYgKGFycjEuaW5kZXhPZihhcnIyW2ldKSA9PSAtMSkge1xyXG4gICAgICBlbGVtZW50LmNsYXNzTmFtZSArPSAnICcgKyBhcnIyW2ldO1xyXG4gICAgfVxyXG4gIH1cclxufVxyXG5cclxuLy8gSGlkZSBlbGVtZW50cyB0aGF0IGFyZSBub3Qgc2VsZWN0ZWRcclxuZnVuY3Rpb24gZmlsdGVyUmVtb3ZlQ2xhc3MoZWxlbWVudCwgbmFtZSkge1xyXG4gIHZhciBpLCBhcnIxLCBhcnIyO1xyXG4gIGFycjEgPSBlbGVtZW50LmNsYXNzTmFtZS5zcGxpdCgnICcpO1xyXG4gIGFycjIgPSBuYW1lLnNwbGl0KCcgJyk7XHJcbiAgZm9yIChpID0gMDsgaSA8IGFycjIubGVuZ3RoOyBpKyspIHtcclxuICAgIHdoaWxlIChhcnIxLmluZGV4T2YoYXJyMltpXSkgPiAtMSkge1xyXG4gICAgICBhcnIxLnNwbGljZShhcnIxLmluZGV4T2YoYXJyMltpXSksIDEpO1xyXG4gICAgfVxyXG4gIH1cclxuICBlbGVtZW50LmNsYXNzTmFtZSA9IGFycjEuam9pbignICcpO1xyXG59XHJcblxyXG4vLyBBZGQgYWN0aXZlIGNsYXNzIHRvIHRoZSBjdXJyZW50IGJ1dHRvbiAoaGlnaGxpZ2h0IGl0KVxyXG52YXIgYnRuQ29udGFpbmVyID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ215QnRuQ29udGFpbmVyJyk7XHJcbnZhciBidG5zID0gYnRuQ29udGFpbmVyLmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ2J0bkZpbHRlcicpO1xyXG5mb3IgKHZhciBpID0gMDsgaSA8IGJ0bnMubGVuZ3RoOyBpKyspIHtcclxuICBidG5zW2ldLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIGN1cnJlbnQgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5Q2xhc3NOYW1lKCdhY3RpdmUnKTtcclxuICAgIGN1cnJlbnRbMF0uY2xhc3NOYW1lID0gY3VycmVudFswXS5jbGFzc05hbWUucmVwbGFjZSgnIGFjdGl2ZScsICcnKTtcclxuICAgIHRoaXMuY2xhc3NOYW1lICs9ICcgYWN0aXZlJztcclxuICB9KTtcclxufVxyXG5cclxuY29uc29sZS5sb2coJ1RoaXMgbG9nIGNvbWVzIGZyb20gYXNzZXRzL2FwcC5qcyAtIHdlbGNvbWUgdG8gQXNzZXRNYXBwZXIhIPCfjoknKTtcclxuIiwiLyogIGltcG9ydCB7IHN0YXJ0U3RpbXVsdXNBcHAgfSBmcm9tICdAc3ltZm9ueS9zdGltdWx1cy1idW5kbGUnO1xuXG5jb25zdCBhcHAgPSBzdGFydFN0aW11bHVzQXBwKCk7XG4vLyByZWdpc3RlciBhbnkgY3VzdG9tLCAzcmQgcGFydHkgY29udHJvbGxlcnMgaGVyZVxuLy8gYXBwLnJlZ2lzdGVyKCdzb21lX2NvbnRyb2xsZXJfbmFtZScsIFNvbWVJbXBvcnRlZENvbnRyb2xsZXIpO1xuKi9cbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyJmaWx0ZXJTZWxlY3Rpb24iLCJjIiwieCIsImkiLCJkb2N1bWVudCIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJsZW5ndGgiLCJmaWx0ZXJSZW1vdmVDbGFzcyIsImNsYXNzTmFtZSIsImluZGV4T2YiLCJmaWx0ZXJBZGRDbGFzcyIsImVsZW1lbnQiLCJuYW1lIiwiYXJyMSIsImFycjIiLCJzcGxpdCIsInNwbGljZSIsImpvaW4iLCJidG5Db250YWluZXIiLCJnZXRFbGVtZW50QnlJZCIsImJ0bnMiLCJhZGRFdmVudExpc3RlbmVyIiwiY3VycmVudCIsInJlcGxhY2UiLCJjb25zb2xlIiwibG9nIl0sInNvdXJjZVJvb3QiOiIifQ==