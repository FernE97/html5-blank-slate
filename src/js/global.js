import Glide from '@glidejs/glide'
import {
  throttle,
  addAttribute,
  keepSquare,
  getPostGrids,
  resizePostGrids,
  awaitSelector,
  watchAwaitSelector,
  externalLinksTargetBlank,
  slideTextContent
} from './functions.js';

// Custom global jQuery scripts
jQuery(document).ready(function ($) {
  'use strict';

  // Foundation Init
  $(document).foundation();

  // Mobile nav toggle
  $('#nav__toggle').on('click', function () {
    $('#nav-mobile').slideToggle();
    $('#site-header').toggleClass('nav__mobile--open');
  });
}(jQuery));


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

  // Creates a custom, optimized resize event
  throttle('resize', 'optimizedResize');

  window.addEventListener('load', function () {
    // For each post grid layout, this resizes the post item parts (heading, text, button)
    // so they align properly: getPostGrids('.selector1, .selector2, #selector3');

    // Initial resize of slides with the "square" or "circle" setting enabled in ACF
    keepSquare('.glide__slide--square, .glide__slide--circle');

    // Gets height of slides and height of any text content,
    // then adds bottom margin to slide and moves text content down accordingly
    slideTextContent();
  });


  window.addEventListener('optimizedResize', function () {
    // For each post grid layout, this resizes the post item parts (heading, text,
    // button) so they align properly resizePostGrids(postGrids)
    // getPostGrids('.selector1, .selector2, #selector3');


    // Keep square dimensions of slides with the "square"
    // or "circle" shape setting enabled in ACF
    keepSquare('.glide__slide--square, .glide__slide--circle');
    slideTextContent();
  });

  // Whenever new links enter the DOM or are changed,
  // check if they are external links and need _blank added
  watchAwaitSelector(function() {
    externalLinksTargetBlank();
  }, 'a', document, 3000);


  // ============================================ //
  // =============== #DONATE #FORM ============== //
  // ============================================ //
  var donateLabels = document.querySelectorAll('.donate__radioLabel');
  var donateButton = document.querySelector('.js--donateButton');
  var donateAmount = document.querySelector('.js--amount');
  var donateFrequency;

  // Toggle active label/frequency value
  for (var i = 0; i < donateLabels.length; ++i) {
    let el = donateLabels[i];
    el.addEventListener('click', function () {
      if (document.querySelector('.donate__form .js--frequency')) {
        document.querySelector('.donate__form .js--frequency').classList.remove('js--frequency');
      }
      el.classList.add('js--frequency');
      donateFrequency = el.getAttribute('data-interval');
    });
  }

  if (donateButton) {
    donateButton.addEventListener('click', function (e) {
      e.preventDefault();
      var amount = donateAmount.value;
      var frequency = '';
      var urlValue;

      // Remove any leading/trailing whitespace
      amount = amount.replace(/\s+/g, '');

      if (donateFrequency == 'monthly') {
        frequency = '&interval=monthly';
      }

      urlValue = e.target.href + '?amount=' + amount + frequency;
      if (amount.match(/^\d+$/) || amount.match(/^\d+$/)) {
        window.location.replace(urlValue);
      }
    });
  }





  // ============================================ //
  // ============== #SLIDER #GLIDER ============= //
  // ============================================ //
  var glide = document.querySelectorAll('.glide');
  if (glide.length > 0) {
    for (let i = 0; i < glide.length; i++) {
      // Initialize Glide slider https://glidejs.com/
      // An even more lightweight alternative is Glider https://nickpiscitelli.github.io/Glider.js/
      new Glide(glide[i], {
        type: 'carousel',
        perView: 3,
        gap: 35,
        breakpoints: {
          1000: {
            perView: 1
          }
        }
      }).mount();
    }
  }


});
