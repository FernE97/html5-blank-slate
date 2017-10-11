// The JS pipleine uses a combination of browserify and babel, allowing you to  
// either `import` or `require` CommonJS and/or ES6 modules alongside simple
// browser targeted JS.
//
// This includes local modules you've written/downloaded, or any modules in the 
// npm ecosystem, meaning you could install any module via yarn/npm and then use 
// it in bundle code with no other configuration.
//
// For example at the command line:
//
//     yarn add underscore
//
// Then in any JS file you've required in the bundle:
//
//     import _ from 'underscore';
//
// OR equivalently:
//
//     var _ = require('underscore');

import './global';
