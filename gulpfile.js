
/**
 * Include Gulp & tools to use
 */
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
const sourcemaps = require('gulp-sourcemaps');
var reload = browserSync.reload;

/**
 * configs
 */
var config = {
  url: "soapatricktwo.local",
  scssSrc: './scss/*.scss',
  scssDest: './css'
};

/**
 * compile sass for development
 */
gulp.task("sass", function() {
  return gulp
    .src(config.scssSrc)
    .pipe(sass({
      errLogToConsole: true,
      outputStyle: 'expanded'
    }).on("error", sass.logError))
    .pipe(gulp.dest(config.scssDest))
    .pipe(browserSync.stream({ match: "**/*.css" }));
});

/**
 * compile sass for deployment
 */
gulp.task("default", function() {
  return gulp
    .src(config.scssSrc)
    .pipe(sass({
      outputStyle: 'compressed'
    }).on("error", sass.logError))
    .pipe(gulp.dest(config.scssDest));
});

/**
 * watch task with browser reload
 */
gulp.task("watch", function() {

  browserSync.init({
    proxy: config.url,
    injectChanges: true,
    notify: false
  });

  gulp.watch(["./scss/**/*.scss"], gulp.series('sass'));
  gulp.watch(["./js/**/*.js"]).on("change", browserSync.reload);
  gulp.watch(["./**/*.php"]).on("change", browserSync.reload);
});
