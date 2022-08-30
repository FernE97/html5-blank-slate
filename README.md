# h5bs Theme

### Basic Setup

- [nodejs](https://nodejs.org/en/)

#### NVM (Node Version Manager)

NVM is not required but is recommended for installing different node versions for various projects.

```bash
# install / update nvm
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.1/install.sh | bash

# install node 16
nvm install 16.17.0

# use node 16
nvm use 16
```

From the console, change directories into the WordPress Theme

```
cd {path}/wp-content/themes/{theme_name}
```

Install gulp (one time)

```
npm i -g gulp@latest
```

Run `npm i` to install the JS dependencies

```
npm i
```

Run `gulp dist` once initially, then when it's time to deploy or when you add
files to the commons or vendor bundles (see advanced usage below).  This will
clean the assets dirs and compile all the JS/CSS bundles.  For deploy, you then
just copy the assets dir up to the server.

```
gulp dist
```

Run `gulp watch` to watch for changes to the apps main scss/js source files as you work.
This will compile any changes made to files js/css in `src/` to their bundles
in `assets/`.  Note this only watches files in `src/`; if, for example, you install
an npm module and add it to the vendor bundle (see advanced usage) you will need
to rerun `gulp dist` (or `gulp js-vendor`) to regenerate the vendor bundle.

```
gulp watch
```

### Browsersync

As an alternative to `gulp watch`, there is a task to run a
[browsersync](https://www.browsersync.io/) server locally, `gulp server`.  By default
it binds to `localhost`.  This and other options are found in `gulpfile.js`.


### Advanced JS Pipeline Usage

The JS pipeline allows for writing code using CommonJS/node or ES6 syntax, and
because of browserify, allows you to use appropriate modules from the npm
ecosystem in the JS bundle without any configuration outside of `npm i {the module}`
and `require`'ing (CommonJS) or `import`'ing (ES6) the module in your code.

This means for example you could, at the command line:

  npm i underscore

Then in a bundled JS file:

  import _ from 'underscore';

OR equivalently:

  var underscore = require('underscore');

If the modules you include grow in number or are complex, you might find that your
JS build time slows down.  Optionally, you can add modules to the commons bundle
such that they're compiled separately.  Continuing the exmaple above, you'd edit
`gulpfile.js` to make this happen, adding "underscore" to the commons modules
array.

If you need to add other vendor JS scripts which are *not* common required
modules, you'd edit `gulpfile.js` to add their full paths to the vendor paths
array.  By default this is how foundation.js is included.  Other examples would
be any self contained script that expects to be loaded via a `<script>` tag,
e.g. jQuery plugins or polyfills/shims.


### Advanced CSS Pipeline Usage

The CSS pipeline is less complex than the JS, but there are still some options to
be configured in `gulpfile.js`.  The full options objects passed to autoprefixer
and sass are found here.  A common change might be the `browsers` targeted by the
autoprefixer.  By default it is `latest 2 versions`.  See other examples
[here](https://github.com/ai/browserslist#queries).
