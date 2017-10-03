var gulp = require('gulp'),
  autoprefixer = require('gulp-autoprefixer'),
  babel = require('gulp-babel'),
  babelify = require('babelify'),
  browserSync = require('browser-sync').create(),
  browserify = require('browserify'),
  buffer = require('vinyl-buffer'),
  concat = require('gulp-concat'),
  del = require('del'),
  fs = require('fs'),
  gutil = require('gulp-util')
  nano = require('gulp-cssnano'),
  path = require('path'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  sassGlob = require('gulp-sass-glob'),
  source = require('vinyl-source-stream'),
  sourcemaps = require('gulp-sourcemaps'),
  uglify = require('gulp-uglify'),
  yaml = require('js-yaml')

var config = yaml.safeLoad(fs.readFileSync('./gulpconfig.yml', 'utf8'));


// Concat/minify self-contained scripts or scripts that aren't otherwise used
// as CommonJS type modules.  By default this includes the Foundation script.
// Other possibilities would be polyfill/shim scripts, etc.
gulp.task('js-vendor', function () {
  return gulp.src(config.js.vendor.paths)
    .pipe(concat(config.js.vendor.filename))
    .pipe(babel())
    .pipe(uglify())
    .pipe(gulp.dest(config.js.dest));
});


// Optionally compile a separate browserify "commons" bundle of js that the 
// site's bundle can `require` from.  If you want to do this add node modules
// to the js.commons.modules array in the yml and uncomment the enqueue for this
// file in functions.php so that WP sends it.
//
// The main advantage is for dev, to reduce the compile time of the bundle
// task, as if the modules are pulled to a commons bundle, they don't have to
// be recompiled when the app bundle changes.
gulp.task('js-commons', function () {
  // See manual for using browserify with gulp/transforms: 
  // https://github.com/gulpjs/gulp/blob/master/docs/recipes/browserify-transforms.md

  var b = browserify({
    debug: true,
    transform: [babelify]
  });

  if (!(config.js.commons.modules && config.js.commons.modules.length)) {
    return;
  }

  b.require(config.js.commons.modules);

  return b.bundle()
    .pipe(source(config.js.commons.filename))
    .pipe(buffer())
    .pipe(uglify())
      .on('error', gutil.log)
    .pipe(gulp.dest(config.js.dest));
});


// Bundle, sourcemap and minify the main app js
gulp.task('js-bundle', function () {
  // See manual for using browserify with gulp/transforms: 
  // https://github.com/gulpjs/gulp/blob/master/docs/recipes/browserify-transforms.md

  var b = browserify({
    entries: config.js.bundle.entries,
    debug: true,
    transform: [
      babelify
    ]
  });

  if (config.js.commons.modules && config.js.commons.modules.length) {
    b.external(config.js.commons.modules);
  }

  return b.bundle()
    .pipe(source(config.js.bundle.filename))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(uglify())
      .on('error', gutil.log)
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.js.dest));
});


// Compile scss/sass files into minified, sourcemapped, autoprefixed CSS
gulp.task('sass', function () {
  return gulp.src(config.css.sass.src)
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass(config.css.sass))
    .pipe(autoprefixer(config.css.autoprefixer))
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(nano())
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(config.css.dest));
});


// Watch the source folders for changes and run compile tasks.  This task should
// always be running during development for automatic compilation of assets.
gulp.task('watch', function () {
  gulp.watch('src/scss/**/*.scss', ['sass']);
  gulp.watch('src/js/**/*.js', ['js-bundle']);
});


// Run a browsersync server, main options managed in gulpconfig.yml
// Alternative to `gulp watch`, run this if you want to make use of browsersync
// for real time code/css updates, etc.
gulp.task('server', ['watch'], function () {
  browserSync.init(config.browsersync);

  browserSync.watch([
    'assets/css/theme.css',
    'assets/js/bundle.js',
    '**/*.php'
  ])
  .on('change', browserSync.reload)
  .on('error', function (err) {
    console.log('error in browsersync watch', err);
    this.emit('end');
  });
});


// Clean gulp-generated js/css assets (automatically run as part of dist)
gulp.task('clean', function () {
  return del([
    path.join(config.js.dest, '*'),
    path.join(config.css.dest, '*')
  ]);
});


// Multistep tasks & default
gulp.task('js', ['js-vendor', 'js-commons', 'js-bundle']);
gulp.task('dist', ['clean', 'js', 'sass']);
gulp.task('default', ['watch']);
