// Optimized resize custom event
export var throttle = function (type, name, obj) {
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


export var addAttribute = function (selector, attribute, attributeValue) {
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

export var keepSquare = function (selector, matchAttr) {
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

export var getPostGrids = function(selector) {
  var postGrids = [];
  // Make array of each 'post grid' layout section on the page
  var postGrid = [...document.querySelectorAll(selector)];

  // 'Caches' all of the post grid items and their parts for significantly better resize performance
  for (let i = 0; i < postGrid.length; i++) {
    // For each post grid, make an array for each part of the post item
    let postItemHeading = [...postGrid[i].querySelectorAll(`${selector}__itemHeading`)];
    let postItemText = [...postGrid[i].querySelectorAll(`${selector}__itemText`)];
    let postItemButton = [...postGrid[i].querySelectorAll(`${selector}__itemButton`)];
    // Make a temporary array of the three post item parts
    let postItem = [postItemHeading, postItemText, postItemButton];
    // Set index to an array of the post item parts
    postGrids[i] = postItem;
  }
  resizePostGrids(postGrids);
}



export var resizePostGrids = function(postGrids) {
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


export var slideTextContent = function() {
  var sliders = [...document.querySelectorAll('.glide__slides')];
  var max;
  var slideHeight;

  if(sliders.length > 0) {
    for (let i = 0; i < sliders.length; i++) {
      max = 0;
      slideHeight = sliders[i].querySelector('.glide__slide').getBoundingClientRect().height;
      let text = sliders[i].querySelectorAll('.glide__textContent');

      for (let j = 0; j < text.length; j++) {
        let textHeight = text[j].getBoundingClientRect().height;
        if (textHeight > max) {
          max = textHeight;
        }
      }

      for (let k = 0; k < text.length; k++) {
        text[k].style.top = slideHeight + 25 + 'px';
        text[k].parentNode.style.marginBottom = max + 25 + 'px';
      }
    }
  }
}


export const awaitSelector = (selector, rootNode, fallbackDelay) => new Promise((resolve, reject) => {
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

export const watchAwaitSelector = (callback, selector, rootNode, fallbackDelay) => {
  (function awaiter(continueWatching = true) {
    if (continueWatching === false) return
    awaitSelector(selector, rootNode, fallbackDelay)
      .then(callback)
      .then(awaiter)
  }())
}


export var externalLinksTargetBlank = function() {
  // remove subdomain of current site's url and setup regex
  var internal = location.host.replace("www.", "");
      internal = new RegExp(internal, "i");

  var a = document.getElementsByTagName('a'); // then, grab every link on the page
  for (var i = 0; i < a.length; i++) {
    var href = a[i].host; // set the host of each link
    if( !internal.test(href) ) { // make sure the href doesn't contain current site's host
      a[i].setAttribute('target', '_blank'); // if it doesn't, set attributes
    }
  }
};
