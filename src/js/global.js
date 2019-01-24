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
  let donateLabel = document.querySelectorAll('.donateForm__radioLabel'),
    i;

  for (i = 0; i < donateLabel.length; ++i) {
    let el = donateLabel[i];
    el.addEventListener('click', function () {
      let formLabel;
      if (document.querySelector('.donateForm__radioLabel--active')) {
        formLabel = document.querySelector('.donateForm__radioLabel--active');
        formLabel.classList.remove('donateForm__radioLabel--active');
      }
      el.classList.add('donateForm__radioLabel--active');
    })
  }

  var buttonAmount = $('.donateForm__input'),
    customAmount = $('.donateForm__input'),
    buttonDonate = $('.js--button-donate'),
    frequencyButton = $('.js--frequency'),
    urlValue

  // Toggling amount
  buttonAmount.on('change', function () {
    $('.donateForm__input').val();
  });

  // Resetting amounts and setting the custom-amount
  customAmount.on('change', function () {
    $('.js--amount').removeClass('active');
  });

  buttonDonate.on('click', function (e) {
    e.preventDefault();
    var amountInput = customAmount.val(),
      amountButton = $('.donateForm__input').val(),
      frequency;

    if ($('.donateForm__radioLabel--active').data('interval') == 'monthly') {
      frequency = '&interval=' + $('.donateForm__radioLabel--active').data('interval')
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
  var glide = document.querySelectorAll('.glide');
  if (glide.length > 0) {
    for (let i = 0; i < glide.length; i++) {
      new Glide(glide[i], {
        type: 'carousel',
        perView: 5,
        gap: 35,
        breakpoints: {
          1200: {
            perView: 3
          },
          800: {
            perView: 2
          },
          450: {
            perView: 1
          }
        }
      }).mount();
    }
  }

  // Initial resize
  keepSquare('.glide__slide');
});

window.addEventListener("optimizedResize", function () {
  keepSquare('.glide__slide');
});
