const gulp = require('gulp')
const autoprefixer = require('gulp-autoprefixer')
const babel = require('gulp-babel')
const babelify = require('babelify')
const browserSync = require('browser-sync').create()
const browserify = require('browserify')
const buffer = require('vinyl-buffer')
const concat = require('gulp-concat')
const del = require('del')
const gutil = require('gulp-util')
const nano = require('gulp-cssnano')
const path = require('path')
const sass = require('gulp-sass')(require('node-sass'))
const sassGlob = require('gulp-sass-glob')
const source = require('vinyl-source-stream')
const sourcemaps = require('gulp-sourcemaps')
const uglify = require('gulp-uglify-es').default
const cache = require('gulp-cache')

const config = {
  js: {
    dest: './assets/js',
    vendor: {
      paths: [
        './node_modules/foundation-sites/dist/js/foundation.js',
      ],
      filename: 'vendor.bundle.js'
    },
    commons: {
      modules: [],
      filename: 'commons.bundle.js'
    },
    bundle: {
      entries: './src/js/bundle.js',
      filename: 'bundle.js'
    }
  },
  css: {
    dest: './assets/css',
    sass: {
      src: './src/scss/theme.scss',
      includePaths: [
        './node_modules',
        './node_modules/foundation-sites/scss',
      ]
    },
    autoprefixer: {
      cascase: false
    }
  },
  browsersync: {
    proxy: 'localhost',
    notify: false,
    open: false,
    snippetOptions: { ignorePaths: 'wp-admin/**' }
  }
}

async function jsVendor() {
  return gulp
    .src(config.js.vendor.paths)
    .pipe(concat(config.js.vendor.filename))
    .pipe(babel())
    .pipe(uglify())
    .pipe(gulp.dest(config.js.dest))
}

exports.jsVendor = jsVendor

// Optionally compile a separate browserify "commons" bundle of js that the
// site's bundle can `require` from.  If you want to do this add node modules
// to the js.commons.modules array in the config and uncomment the enqueue for this
// file in functions.php so that WP sends it.
//
// The main advantage is for dev, to reduce the compile time of the bundle
// task, as if the modules are pulled to a commons bundle, they don't have to
// be recompiled when the app bundle changes.
async function jsCommons() {
  // See manual for using browserify with gulp/transforms:
  // https://github.com/gulpjs/gulp/blob/master/docs/recipes/browserify-transforms.md

  const b = browserify({
    debug: true,
    transform: [babelify]
  })

  if (!(config.js.commons.modules && config.js.commons.modules.length)) {
    return
  }

  b.require(config.js.commons.modules)

  b.bundle()
    .pipe(source(config.js.commons.filename))
    .pipe(buffer())
    .pipe(uglify())
    .on('error', gutil.log)
    .pipe(gulp.dest(config.js.dest))
}
exports.jsCommons = jsCommons

// Bundle, sourcemap and minify the main app js
async function jsBundle() {
  // See manual for using browserify with gulp/transforms:
  // https://github.com/gulpjs/gulp/blob/master/docs/recipes/browserify-transforms.md

  const b = browserify({
    entries: config.js.bundle.entries,
    debug: true,
    transform: [['babelify', { presets: ['@babel/preset-env'] }]]
  })

  if (config.js.commons.modules && config.js.commons.modules.length) {
    b.external(config.js.commons.modules)
  }

  b.bundle()
    .pipe(source(config.js.bundle.filename))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(uglify())
    .on('error', gutil.log)
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(config.js.dest))
}

exports.jsBundle = jsBundle

// Compile scss/sass files into minified, sourcemapped, autoprefixed CSS
async function sassBundle(cb) {
  return gulp
    .src(config.css.sass.src)
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass(config.css.sass))
    .pipe(autoprefixer(config.css.autoprefixer))
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(cache(nano()))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.css.dest))
}

exports.sassBuild = sassBundle

// Watch the source folders for changes and run compile tasks.  This task should
// always be running during development for automatic compilation of assets.
function watch() {
  gulp.watch('src/scss/**/*.scss', gulp.series(cssBuild))
  gulp.watch('src/js/**/*.js', gulp.series(jsBuild))
}

exports.watch = watch

// Clean gulp-generated js/css assets (automatically run as part of dist)
function clean() {
  return del([path.join(config.js.dest, '*'), path.join(config.css.dest, '*')])
}

exports.clean = clean

async function jsBuild() {
  return gulp.parallel(jsVendor, jsCommons, jsBundle)()
}
async function cssBuild() {
  return gulp.parallel(sassBundle)()
}
async function dist() {
  return gulp.series(clean, jsBuild, sassBundle)()
}

function server() {
  return gulp.parallel(watch, () => {
    browserSync.init(config.browsersync)

    browserSync
      .watch(['assets/css/theme.css', 'assets/js/bundle.js', '**/*.php'])
      .on('change', browserSync.reload)
      .on('error', function (err) {
        console.log('error in browsersync watch', err)
        this.emit('end')
      })
  })()
}
exports.server = server

exports.js = jsBuild
exports.sass = cssBuild
exports.dist = dist
