/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/front.js":
/*!*************************!*\
  !*** ./src/js/front.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

var scrollTo = function scrollTo() {
  // If is front page...
  // Listen to menu items with urls to home page (.menu-item-type-custom)
  // Get hashes on click
  // get corresponding id
  // scroll there with header offset accounted for.
  // Check is Front Page.
  //const w = document.querySelector('.page-template-page-frontpage');
  // if (!w) {
  // 	return;
  // }
  var menuItems = document.querySelectorAll('.menu-item-type-custom');

  if (!menuItems || !menuItems.length) {
    return;
  }

  menuItems.forEach(function (menuItem) {
    return menuItem.addEventListener('click', handleScrollTo);
  });

  function handleScrollTo(e) {
    var DURATION = 300;
    var targetElementId = getTargetElementIdFromHash(e);

    if (!targetElementId) {
      return;
    } // Only prevent default if we have the target #id.


    e.preventDefault(); // Unlikely that main nav is not the first <header>?!

    var headerHeight = document.getElementsByTagName('header')[0].offsetHeight;
    var targetEl = document.querySelector("".concat(targetElementId));
    var targetPosition = targetEl.getBoundingClientRect().top + window.scrollY; // Note scrollY

    var startPosition = window.pageYOffset;
    var distance = targetPosition - startPosition - headerHeight;
    var startTime = null;

    function animation(currentTime) {
      if (startTime === null) {
        startTime = currentTime;
      }

      var timeElapsed = currentTime - startTime;
      var run = easy(timeElapsed, startPosition, distance, DURATION);
      window.scrollTo(0, run);

      if (timeElapsed < DURATION) {
        requestAnimationFrame(animation);
      }
    }

    function easy(t, b, c, d) {
      // http://www.gizma.com/easing/
      t /= d / 2;
      if (t < 1) return c / 2 * t * t * t * t + b;
      t -= 2;
      return -c / 2 * (t * t * t * t - 2) + b;
    }

    requestAnimationFrame(animation);
  }

  function getTargetElementIdFromHash(e) {
    if (e.target.tagName === 'A') {
      return e.target.hash;
    } else if (e.currentTarget.tagName === 'A') {
      return e.currentTarget.hash;
    } else {
      return null;
    }
  } // 	const temp = document.getElementById('menu-item-113');
  // temp.addEventListener('click', scrollToTargetAdjusted)


  function scrollToTargetAdjusted(e) {
    console.log('okay');
    e.preventDefault();
    var element = document.getElementById('ywig-finder');
    var headerOffset = 16 * 7; // var elementPosition = element.getBoundingClientRect().top;
    // var offsetPosition = elementPosition - headerOffset;

    var bodyRect = document.body.getBoundingClientRect().top;
    var elementRect = element.getBoundingClientRect().top;
    var elementPosition = elementRect - bodyRect;
    var offsetPosition = elementPosition;
    console.log('OP', offsetPosition); // window.scrollTo({
    //      top: offsetPosition,
    //      behavior: "smooth"
    // });
  }

  function scrollToTarget() {
    var element = document.getElementById('ywig-finder');
    element.scrollIntoView({
      block: 'start',
      behavior: 'smooth'
    });
  } // function scrollToTargetAdjusted() {
  //     var element = document.getElementById('ywig-finder');
  //     var headerOffset = 16*7;
  //     var elementPosition = element.getBoundingClientRect().top;
  //     var offsetPosition = elementPosition - headerOffset;
  //     window.scrollTo({
  //         top: offsetPosition,
  //         behavior: "smooth"
  //     });
  // }
  // function backToTop() {
  //   window.scrollTo(0, 0);
  // }

};

scrollTo(); // export default scrollTo;

/***/ }),

/***/ 1:
/*!*******************************!*\
  !*** multi ./src/js/front.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\ywig-theme\wp-content\themes\ywig-theme\src\js\front.js */"./src/js/front.js");


/***/ })

/******/ });