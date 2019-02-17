import Glide from '@glidejs/glide'

// Custom global jQuery scripts
jQuery(document).ready(function ($) {
  'use strict';

  // Foundation Init
  $(document).foundation();

  // Mobile nav toggle
  $('#nav-mobile-toggle').on('click', function () {
    $('#nav-mobile').slideToggle();
  });


  // -------------------- DONATION FORM ------------------- //
  let donateLabel = document.querySelectorAll('.donate__radioLabel'), i;

  for (i = 0; i < donateLabel.length; ++i) {
    let el = donateLabel[i];
    el.addEventListener('click', function () {
      let formLabel;
      if (document.querySelector('.donate__form .js--active')) {
        formLabel = document.querySelector('.donate__form .js--active');
        formLabel.classList.remove('js--active');
      }
      el.classList.add('js--active');
    })
  }

  var buttonAmount = $('.donate__input'),
    customAmount = $('.donate__input'),
    buttonDonate = $('.js--button-donate'),
    frequencyButton = $('.js--frequency'),
    urlValue

  // Toggling amount
  buttonAmount.on('change', function () {
    $('.donate__input').val();
  });

  // Resetting amounts and setting the custom-amount
  customAmount.on('change', function () {
    $('.js--amount').removeClass('active');
  });

  buttonDonate.on('click', function (e) {
    e.preventDefault();
    var amountInput = customAmount.val(),
      amountButton = $('.donate__input').val(),
      frequency;

    if ($('.donate__form .js--active').data('interval') == 'monthly') {
      frequency = '&interval=' + $('.donate__form .js--active').data('interval')
    } else {
      frequency = ''
    }

    urlValue = e.target.href + '?amount=' + amountButton + frequency
    if ($.trim(amountInput).match(/^\d+$/) || $.trim(amountButton).match(/^\d+$/))
      window.location.replace(urlValue);
  });
}(jQuery));


// IE11 Custom Elements Polyfill
(function () {
  if (typeof window.CustomEvent === "function") return false;

  function CustomEvent(event, params) {
    params = params || {
      bubbles: false,
      cancelable: false,
      detail: undefined
    };
    var evt = document.createEvent('CustomEvent');
    evt.initCustomEvent(event, params.bubbles, params.cancelable, params.detail);
    return evt;
  }
  CustomEvent.prototype = window.Event.prototype;
  window.CustomEvent = CustomEvent;
})();

// Optimized resize custom event
(function () {
  var throttle = function (type, name, obj) {
    obj = obj || window;
    var running = false;
    var func = function () {
      if (running) {
        return;
      }
      running = true;
      requestAnimationFrame(function () {
        obj.dispatchEvent(new CustomEvent(name));
        running = false;
      });
    };
    obj.addEventListener(type, func);
  };
  /* init - you can init any event */
  throttle("resize", "optimizedResize");
})();


var addAttribute = function (selector, attribute, attributeValue) {
  // If it is a node, such as a variable set to document.getElementById('id');
  if (selector.nodeType === Node.ELEMENT_NODE) {
    selector.setAttribute(attribute, attributeValue);
  }
  // If selector already is an array
  else if (Array.isArray(selector)) {
    selector.map(function (val) {
      val.setAttribute(attribute, attributeValue)
    })
  }
  // If a string was passed, make an array out of it
  else if (typeof selector === 'string') {
    [...document.querySelectorAll(selector)].map(function (val) {
      val.setAttribute(attribute, attributeValue)
    })
  }
};

var keepSquare = function (selector, matchAttr) {
  if (typeof selector !== 'undefined') {
    var s = document.querySelectorAll(selector);
    if (s.length > 0) {
      var w = s[0].clientWidth;
      var h = s[0].clientHeight;

      if (matchAttr == 'height') {
        for (let i = 0; i < s.length; i++) {
          s[i].style.width = h + 'px';
        }
      } else {
        for (let i = 0; i < s.length; i++) {
          s[i].style.height = w + 'px';
        }
      }
    }
  }
}


var resizePostItems = function(postGrids) {
  postGrids.map(function(postItem) {
    postItem.map(function (item) {
      let max = 0;
      item.map(function (el) {
        // Remove current inline style so that it won't keep reusing the largest size set previously
        el.style.height = '';
        if (el.offsetHeight > max) {
          max = el.offsetHeight;
        }
      });

      if (max > 0) {
        item.map(function (el) {
          el.style.height = max+'px';
        });
      }
    });
  });
}

// Document load/ready promise, calls 'ready' method when completed
HTMLDocument.prototype.ready = function () {
  return new Promise(function (resolve, reject) {
    if (document.readyState === 'complete') {
      resolve(document);
    } else {
      document.addEventListener('DOMContentLoaded', function () {
        resolve(document);
      });
    }
  });
};

// Custom global scripts
document.ready().then(function () {

  var postGrids = [];
  var postGrid = [...document.querySelectorAll('.postGrid')];

  for (let i = 0; i < postGrid.length; i++) {
    let postItemHeading = [...postGrid[i].querySelectorAll('.postGrid__itemHeading')];
    let postItemText = [...postGrid[i].querySelectorAll('.postGrid__itemText')];
    let postItemButton = [...postGrid[i].querySelectorAll('.postGrid__itemButton')];
    let postItem = [postItemHeading, postItemText, postItemButton];
    postGrids[i] = postItem;
  }

  window.addEventListener('load', function() {
    resizePostItems(postGrids)
  });

  window.addEventListener('resize', function() {
    resizePostItems(postGrids)
  });


  var glide = document.querySelectorAll('.glide');
  if (glide.length > 0) {
    for (let i = 0; i < glide.length; i++) {
      new Glide(glide[i], {
        type: 'carousel',
        perView: 3,
        gap: 35,
        breakpoints: {
          800: {
            perView: 1
          }
        }
      }).mount();
    }
  }

  // Initial resize
  keepSquare('.glide__slide--square, .glide__slide--circle');
});

window.addEventListener("optimizedResize", function () {
  keepSquare('.glide__slide--square, .glide__slide--circle');
  keepSquare('.postGrid__itemPhoto');
});
