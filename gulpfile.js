var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sassGlob = require('gulp-sass-glob'),
    sourcemaps = require('gulp-sourcemaps'),
    concat = require('gulp-concat'),
    nano = require('gulp-cssnano'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    autoprefixer = require('gulp-autoprefixer'),
    babel = require('gulp-babel');

gulp.task('sass', function () {
    return gulp.src('./assets/stylesheets/theme.scss')
        .pipe(sourcemaps.init())
            .pipe(sassGlob())
            .pipe(sass({includePaths : ['./assets/components/foundation-sites']}))
            .pipe(autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false
            }))
            .pipe(sass.sync().on('error', sass.logError))
            .pipe(nano())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/stylesheets'));
});

gulp.task('js', function () {

    // Add/remove any js to be included into
    // the main.js file
    var files = [
        // Foundation JS
        'assets/components/foundation-sites/js/foundation.core.js',
        'assets/components/foundation-sites/js/foundation.util.mediaQuery.js',
        'assets/components/foundation-sites/js/foundation.util.timerAndImageLoader.js',
        'assets/components/foundation-sites/js/foundation.equalizer.js',
        'assets/components/foundation-sites/js/foundation.reveal.js',
        'assets/components/foundation-sites/js/foundation.tabs.js',
        'assets/components/foundation-sites/js/foundation.util.keyboard.js',
        'assets/components/foundation-sites/js/foundation.util.box.js',
        'assets/components/foundation-sites/js/foundation.util.nest.js',
        'assets/components/foundation-sites/js/foundation.dropdownMenu.js',
        'assets/components/foundation-sites/js/foundation.util.triggers.js',
        'assets/components/foundation-sites/js/foundation.util.motion.js',
        // 'assets/components/foundation-sites/js/foundation.responsiveMenu.js',
        // 'assets/components/foundation-sites/js/foundation.responsiveToggle.js',
        // 'assets/components/foundation-sites/js/foundation.abide.js',
        // 'assets/components/foundation-sites/js/foundation.accordion.js',
        // 'assets/components/foundation-sites/js/foundation.accordionMenu.js',
        // 'assets/components/foundation-sites/js/foundation.drilldown.js',
        // 'assets/components/foundation-sites/js/foundation.interchange.js',
        // 'assets/components/foundation-sites/js/foundation.magellan.js',
        // 'assets/components/foundation-sites/js/foundation.offcanvas.js',
        // 'assets/components/foundation-sites/js/foundation.orbit.js',
        // 'assets/components/foundation-sites/js/foundation.slider.js',
        // 'assets/components/foundation-sites/js/foundation.sticky.js',
        // 'assets/components/foundation-sites/js/foundation.toggler.js',
        // 'assets/components/foundation-sites/js/foundation.tooltip.js',
        // 'assets/components/foundation-sites/js/foundation.util.touch.js',


        // Vendor JS
        'assets/javascripts/vendor/**/*.js',

        // Custom JS
        'assets/javascripts/custom/global.js',
        'assets/javascripts/custom/**/*.js'
    ];

    return gulp.src(files)
        .pipe(concat('main.js'))
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(uglify())
        .pipe(gulp.dest('assets/javascripts'));
});

gulp.task('serve', function () {
    browserSync.init({notify: false});

    gulp.watch('assets/stylesheets/**/*.scss', ['sass']);
    gulp.watch(
        [
            'assets/javascripts/custom/**/*.js',
            'assets/javascripts/vendor/**/*.js'
        ],
        ['js']
    );
    browserSync.watch(
        [
            'assets/stylesheets/theme.css',
            '**/*.php'
        ]
    ).on('change', browserSync.reload);
});

gulp.task('compile', ['js', 'sass']);
gulp.task('default', ['serve']);
