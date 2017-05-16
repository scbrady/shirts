/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 14);
/******/ })
/************************************************************************/
/******/ ({

/***/ 1:
/***/ (function(module, exports) {

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/**
 * ImageZoom Plugin
 * http://0401morita.github.io/imagezoom-plugin
 * MIT licensed
 *
 * Copyright (C) 2014 http://0401morita.github.io/imagezoom-plugin A project by Yosuke Morita
 */
(function ($) {
  var defaults = {
    cursorcolor: '255,255,255',
    opacity: 0.5,
    cursor: 'crosshair',
    zindex: 2147483647,
    zoomviewsize: [480, 395],
    zoomviewposition: 'right',
    zoomviewmargin: 10,
    zoomviewborder: 'none',
    magnification: 1.925
  };

  var imagezoomCursor, imagezoomView, settings, imageWidth, imageHeight, offset;
  var methods = {
    init: function init(options) {
      $this = $(this), imagezoomCursor = $('.imagezoom-cursor'), imagezoomView = $('.imagezoom-view'), $(document).on('mouseenter', $this.selector, function (e) {
        var data = $(this).data();
        settings = $.extend({}, defaults, options, data), offset = $(this).offset(), imageWidth = $(this).width(), imageHeight = $(this).height(), cursorSize = [settings.zoomviewsize[0] / settings.magnification, settings.zoomviewsize[1] / settings.magnification];
        if (data.imagezoom == true) {
          imageSrc = $(this).attr('src');
        } else {
          imageSrc = $(this).get(0).getAttribute('data-imagezoom');
        }

        var posX = e.pageX,
            posY = e.pageY,
            zoomViewPositionX;
        $('body').prepend('<div class="imagezoom-cursor">&nbsp;</div><div class="imagezoom-view"><img src="' + imageSrc + '"></div>');

        if (settings.zoomviewposition == 'right') {
          zoomViewPositionX = offset.left + imageWidth + settings.zoomviewmargin;
        } else {
          zoomViewPositionX = offset.left - imageWidth - settings.zoomviewmargin;
        }

        $(imagezoomView.selector).css({
          'position': 'absolute',
          'left': zoomViewPositionX,
          'top': offset.top,
          'width': cursorSize[0] * settings.magnification,
          'height': cursorSize[1] * settings.magnification,
          'background': '#000',
          'z-index': 2147483647,
          'overflow': 'hidden',
          'border': settings.zoomviewborder
        });

        $(imagezoomView.selector).children('img').css({
          'position': 'absolute',
          'width': imageWidth * settings.magnification,
          'height': imageHeight * settings.magnification
        });

        $(imagezoomCursor.selector).css({
          'position': 'absolute',
          'width': cursorSize[0],
          'height': cursorSize[1],
          'background-color': 'rgb(' + settings.cursorcolor + ')',
          'z-index': settings.zindex,
          'opacity': settings.opacity,
          'cursor': settings.cursor
        });
        $(imagezoomCursor.selector).css({ 'top': posY - cursorSize[1] / 2, 'left': posX });
        $(document).on('mousemove', document.body, methods.cursorPos);
      });
    },
    cursorPos: function cursorPos(e) {
      var posX = e.pageX,
          posY = e.pageY;
      if (posY < offset.top || posX < offset.left || posY > offset.top + imageHeight || posX > offset.left + imageWidth) {
        $(imagezoomCursor.selector).remove();
        $(imagezoomView.selector).remove();
        return;
      }

      if (posX - cursorSize[0] / 2 < offset.left) {
        posX = offset.left + cursorSize[0] / 2;
      } else if (posX + cursorSize[0] / 2 > offset.left + imageWidth) {
        posX = offset.left + imageWidth - cursorSize[0] / 2;
      }

      if (posY - cursorSize[1] / 2 < offset.top) {
        posY = offset.top + cursorSize[1] / 2;
      } else if (posY + cursorSize[1] / 2 > offset.top + imageHeight) {
        posY = offset.top + imageHeight - cursorSize[1] / 2;
      }

      $(imagezoomCursor.selector).css({ 'top': posY - cursorSize[1] / 2, 'left': posX - cursorSize[0] / 2 });
      $(imagezoomView.selector).children('img').css({ 'top': (offset.top - posY + cursorSize[1] / 2) * settings.magnification, 'left': (offset.left - posX + cursorSize[0] / 2) * settings.magnification });

      $(imagezoomCursor.selector).mouseleave(function () {
        $(this).remove();
      });
    }
  };

  $.fn.imageZoom = function (method) {
    if (methods[method]) {
      return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if ((typeof method === 'undefined' ? 'undefined' : _typeof(method)) === 'object' || !method) {
      return methods.init.apply(this, arguments);
    } else {
      $.error(method);
    }
  };

  $(document).ready(function () {
    $('[data-imagezoom]').imageZoom();
  });
})(jQuery);

/***/ }),

/***/ 14:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(1);


/***/ })

/******/ });