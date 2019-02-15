//Document load/ready promise, calls 'ready' method when completed
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

// @param: selector, node, node list, or array of elements
// @attribute: the attribute to add to matching @param elements
// @attributeValue: the value to assign to the attribute
// @appendStyles: boolean, only applied if adding a style attribute. This is just for QoL, and defaults to true since the latest @attributeValue should override any existing, identical properties. If set to false, any existing 'style' attribute will be replaced, the same behavior as other attributes
function addAttribute(param, attribute, attributeValue, appendStyles) {
  if (attribute != 'style' || appendStyles == false) {
    appendStyles = false;
  } else {
    appendStyles = true;
    var newStyles = attributeValue;
  }

  // If it is a node, such as a variable set to document.getElementById('id');
  if (param.nodeType === Node.ELEMENT_NODE) {
    if (appendStyles) {
      attributeValue = param.getAttribute('style')+newStyles;
    }
    param.setAttribute(attribute, attributeValue);
  }

  // If param already is an array
  else if (Array.isArray(param)) {
    param.map(function (val) {
      if (appendStyles) {
        attributeValue = val.getAttribute('style')+newStyles;
      }
      val.setAttribute(attribute, attributeValue)
    });
  }

  // If a string was passed, make an array out of it
  else if (typeof param === 'string') {
    [...document.querySelectorAll(param)].map(function (val) {
      if (appendStyles) {
        attributeValue = val.getAttribute('style')+newStyles;
      }
      val.setAttribute(attribute, attributeValue)
    });
  }
};



// watchAwaitSelector() near bottom uses MutationObserver to detect DOM changes,
// which is very useful for working with elements/resources that load late (such as the color picker fields)
// and has significantly better performance than the older method of using setTimeout and/or setInterval
const awaitSelector = (selector, rootNode, fallbackDelay) => new Promise((resolve, reject) => {
  try {
    const root = rootNode || document
    const ObserverClass = MutationObserver || WebKitMutationObserver || null
    const mutationObserverSupported = typeof ObserverClass === 'function'
    let observer
    const stopWatching = () => {
      if (observer) {
        if (mutationObserverSupported) {
          observer.disconnect()
        } else {
          clearInterval(observer)
        }
        observer = null
      }
    }
    const findAndResolveElements = () => {
      const allElements = root.querySelectorAll(selector)
      if (allElements.length === 0) return
      const newElements = []
      const attributeForBypassing = 'data-awaitselector-resolved'
      allElements.forEach((el, i) => {
        if (typeof el[attributeForBypassing] === 'undefined') {
          allElements[i][attributeForBypassing] = ''
          newElements.push(allElements[i])
        }
      })
      if (newElements.length > 0) {
        stopWatching()
        resolve(newElements)
      }
    }
    if (mutationObserverSupported) {
      observer = new ObserverClass(mutationRecords => {
        const nodesWereAdded = mutationRecords.reduce(
          (found, record) => found || (record.addedNodes && record.addedNodes.length > 0),
          false
        )
        if (nodesWereAdded) {
          findAndResolveElements()
        }
      })
      observer.observe(root, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeOldValue: true,
        characterData: true,
        characterDataOldValue: true
      })
    } else {
      observer = setInterval(findAndResolveElements, fallbackDelay || 250)
    }
    findAndResolveElements()
  } catch (exception) {
    reject(exception)
  }
})

// Callback function | selectors to watch for | where to watch from, usually 'document' | delay in MS if they don't support MutationObserver
const watchAwaitSelector = (callback, selector, rootNode, fallbackDelay) => {
  (function awaiter(continueWatching = true) {
    if (continueWatching === false) return
    awaitSelector(selector, rootNode, fallbackDelay)
      .then(callback)
      .then(awaiter)
  }())
}

function stylesheet(sheetID, code) {
  if (document.getElementById(sheetID)) {
    document.getElementById(sheetID).innerHTML += code;
  } else {
    var sheet = document.createElement('style');
    sheet.id = sheetID;
    sheet.innerHTML = code;
    document.body.appendChild(sheet);
  }
}

/*
------------------------------------------
  Example use of new ACF JavaScript API

  If the color scheme toggle is enabled in 'Global Options' then the color picker options can be limited
  to the colors added on the 'Global Options' page, making it easier to stick with a set color scheme
------------------------------------------
*/

document.ready().then(function () {

  watchAwaitSelector(function() {
    // Replaces and reduces the inline height and min height, but still allows it to be resized by the user
   addAttribute('.acf-editor-wrap iframe', 'style', 'min-height: 0px; height: 100px;', true);

    // Hides the "Visual/Text" tabs, comment out to keep the tabs visible
    // addAttribute('.wp-editor-tabs', 'style', 'display: none !important;', true);
  }, '.acf-editor-wrap iframe', document, 1500);

  // global_settings is an ACF group passed using wp_localize_script() in functions.php
  var colorScheme = global_settings['color_scheme']; // Color picker repeater
  var toggle = global_settings['color_scheme_toggle']; // True|False switch

  // If the color scheme option is enabled, and there is at least one color added
  if ((colorScheme.length > 0) && (toggle == 1)) {
    var colors = [];
    for (let i = 0; i < colorScheme.length; i++) {
      // Fill array
      colors.push(colorScheme[i]['color']);
    }

    // Not on global options page, so hide the color picker and only show palettes
    if (!document.getElementById('global_settings')) {

      // Apply ACF color picker filter
      // https://www.advancedcustomfields.com/resources/javascript-api/#filters-color_picker_args
      acf.add_filter('color_picker_args', function (args, $field) {
        args.palettes = colors;
        return args;
      });

      // Color Picker styling
      watchAwaitSelector(function () {
        var picker = document.querySelectorAll('.iris-picker-inner');
        var inputWrap = document.querySelectorAll('.wp-picker-input-wrap');

        // Remove each of the .iris-picker-inner elements
        for (let i = 0; i < picker.length; i++) {
          if (picker[i].parentNode) {
            picker[i].parentNode.removeChild(picker[i]);
          }
        }

        // Remove each of the .wp-picker-input-wrap elements
        for (let i = 0; i < inputWrap.length; i++) {
          if (inputWrap[i].parentNode) {
            inputWrap[i].parentNode.removeChild(inputWrap[i]);
          }
        }
      }, '.iris-palette-container, .iris-picker-inner, .wp-picker-input-wrap, .iris-palette, .wp-picker-active', document, 1500);


      stylesheet('colorpicker_customstyles', '.iris-palette {width: 50px !important; height: 50px !important; margin: .5px !important; padding: 0 !important; border-radius: 0 !important;} .wp-picker-active .iris-picker{display: flex !important;flex-wrap:wrap !important;align-content:flex-start !important; justify-content: center !important;width:255px !important;height:initial !important;padding:0 !important;} .iris-palette-container {width: 100%; position: relative !important; bottom: 0 !important; left: 0 !important; display: flex !important; flex-wrap: wrap !important;}');
    }
  }


  // Range slider custom styling (the default ACF slider was not visible, but the input box was)
  stylesheet('slider_fix', '[type=range]{margin:0;padding:0;width:12.5em;height:.25em;background:0 0;font:1em/1 arial,sans-serif}[type=range],[type=range]::-webkit-slider-thumb{-webkit-appearance:none}[type=range]::-webkit-slider-runnable-track{box-sizing:border-box;border:none;width:12.5em;height:.25em;background:#ccc}[type=range]::-moz-range-track{box-sizing:border-box;border:none;width:12.5em;height:.25em;background:#ccc}[type=range]::-ms-track{box-sizing:border-box;border:none;width:12.5em;height:.25em;background:#ccc}[type=range]::-webkit-slider-thumb{margin-top:-.625em;box-sizing:border-box;border:none;width:1.5em;height:1.5em;border-radius:50%;background:#f90}[type=range]::-moz-range-thumb{box-sizing:border-box;border:none;width:1.5em;height:1.5em;border-radius:50%;background:#f90}[type=range]::-ms-thumb{margin-top:0;box-sizing:border-box;border:none;width:1.5em;height:1.5em;border-radius:50%;background:#f90}[type=range]::-ms-tooltip{display:none}');
});
