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

/***/ "./resources/js/client/home.js":
/*!*************************************!*\
  !*** ./resources/js/client/home.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// window.$ = window.jQuery = require('jquery')

var toggleNav = function toggleNav() {
var btnToggle = document.getElementById("js__open-nav");

  if (!btnToggle) {
    return;
  } /// add class neo scroll


  var bodies = document.getElementsByTagName('body');

  if (bodies.length) {
    var body = bodies[0];
    body.classList.toggle('neo-scroll');
  } /// add class open to btn


  btnToggle.classList.toggle('open'); /// add class open to nav

  var nav = document.getElementById('js__nav');

  if (nav) {
    nav.classList.toggle('open');
  } /// show sidebar


  var sidebar = document.getElementById('js__sidebar');

  if (sidebar) {
    sidebar.classList.toggle('open');
  }
};

var listenToggleNav = function listenToggleNav() {
  var btnToggle = document.getElementById("js__open-nav");

  if (btnToggle) {
    btnToggle.onclick = function (e) {
      toggleNav();
    };
  }
};

var listenBtnCloseNav = function listenBtnCloseNav() {
  var btnCloseNav = document.getElementById("js__close-nav");

  if (btnCloseNav) {
    btnCloseNav.onclick = function (e) {
      toggleNav();
    };
  }

  var btnCloseNavi = document.getElementById("js__close-navi");

  if (btnCloseNavi) {
    btnCloseNavi.onclick = function (e) {
      toggleNav();
    };
  }
};
/*slideshow processing */

/*fadein  */
$(function(){
    $(window).scroll(function (){
      $('.fadein').each(function(){
          var targetElement = $(this).offset().top;
          var scroll = $(window).scrollTop();
          var windowHeight = $(window).height();
          if(scroll >= 100){
          if (scroll > targetElement - windowHeight + 40){
              $(this).css('opacity','1');
              $(this).css('transform','translateX(0)');
          }
        }
      });
  });	
$(window).scroll(function (){
      $('.fadeinzoom').each(function(){
          var targetElement = $(this).offset().top;
          var scroll = $(window).scrollTop();
          var windowHeight = $(window).height();
          if (scroll > targetElement - windowHeight + 40){
              $(this).css('opacity','1');
              $(this).css('transform','translateX(0)');
          }
      });
  });	
  
 

});
/*end fadein */
var slideIndex = 0;

function showSlides() {
  var wrapper__slider = document.getElementById('js__homeslider');

  if (!wrapper__slider) {
    return false;
  } /// check if dom mobile remove video

  //if (window.innerWidth == 991) {
  // window.onresize = () => { window.location.reload()}
  //}

  if (window.innerWidth < 991) {
    var lstslide = wrapper__slider.getElementsByClassName("homeslider__item"); /// is mobile
    
    for (var pos = 0; pos < lstslide.length; pos++) {
      if (lstslide[pos].classList.contains("homeslider__item-video")) {
        /// remove
        lstslide[pos].remove();
      }
    }
  }

  var slides = wrapper__slider.getElementsByClassName("homeslider__item"); /// slide exist then run 

  if (slides.length) {
    for (var i = 0; i < slides.length; i++) {
      slides[i].classList.remove('show');
    }

    slideIndex++; /// reset slide index

    if (slideIndex > slides.length) {
      slideIndex = 1;
    } /// show slide


    slides[slideIndex - 1].classList.add('show'); /// auto run loop slider

    setTimeout(showSlides, 5000);
  }
}

showSlides();

var formatHeightBlockHome = function formatHeightBlockHome() {
  console.log("formatHeightBlockHome");

  var __format = document.getElementById("js__format-height-article");

  if (!__format) {
    return false;
  } /// format


  var articles = __format.getElementsByClassName('article__default');

  if (!articles.length) {
    return;
  }

  var first__article = articles[0];
  var first__article_height = Math.ceil(first__article.offsetWidth);

  for (var index = 0; index < articles.length; index++) {
    articles[index].style.height = first__article_height + "px";

    if (window.innerWidth > 768) {
      /// fix clear bold
      if (index % 3 == 2) {
        /// check dom + 2 isset
        if (index + 2 > 0 && index + 2 < articles.length) {
          /// check type == 2 
          if (articles[index + 2].classList.contains('article__right')) {
            /// add class 
            articles[index].classList.add('article__default-clearbold');
          }
        }
      }

      if (index - 5 > 0 && index - 5 < articles.length) {
        /// check type == 2 
        if (articles[index - 5].classList.contains('article__left')) {
          /// add class 
          articles[index].classList.add('article__default-clearbold');
        }
      }

      if (index - 1 > 0 && index - 1 < articles.length) {
        /// check type == 2 
        if (articles[index - 1].classList.contains('article__right')) {
          /// add class 
          articles[index].classList.add('article__default-clearbold');
        }
      }
    }
  }

  var article__rights = __format.getElementsByClassName('article__right');

  if (article__rights.length) {
    for (var _index = 0; _index < article__rights.length; _index++) {
      var article__right = article__rights[_index];
      article__right.style.height = 2 * first__article_height + "px";
    }
  }

  var article__lefts = __format.getElementsByClassName('article__left');

  if (article__lefts.length) {
    for (var _index2 = 0; _index2 < article__lefts.length; _index2++) {
      var article__left = article__lefts[_index2];
      article__left.style.height = 2 * first__article_height + "px";
    }
  }
};

formatHeightBlockHome();
window.addEventListener('resize', function () {
  formatHeightBlockHome();
});
console.log("client home");
listenToggleNav();
listenBtnCloseNav();
$(document).ready(function () {
  //// load slider
  var sliderwrapper = document.getElementById("js__homeslider");

  if (sliderwrapper && window.innerWidth < 991) {
    var slideitems = sliderwrapper.getElementsByClassName("homeslider__item");

    for (var pos = 0; pos < slideitems.length; pos++) {
      var src = slideitems[pos].getAttribute('data-src-mobile');
      slideitems[pos].style.backgroundImage = "url('" + src + "')";
    }
  }

  $("#js__back-to-top").on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, '300');
  });
}); // window.backToTop = e => {
// }

/***/ }),

/***/ 1:
/*!*******************************************!*\
  !*** multi ./resources/js/client/home.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\weCompany\SERVER_PHP\resources\js\client\home.js */"./resources/js/client/home.js");


/***/ })

/******/ });