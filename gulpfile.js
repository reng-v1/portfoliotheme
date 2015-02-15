var gulp = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var livereload = require('gulp-livereload');
var uglify = require('gulp-uglify');
var imageResize = require('gulp-image-resize');
var compass = require('gulp-compass');
var cache = require('gulp-cache');

gulp.task('compass', function() {
  gulp.src('./scss/*.scss')
  .pipe(compass({
    css: 'css',
    sass: 'scss',
    image: './images',
    javascript: 'wp/wp-content/themes/mindfulliving/js',
    relative: true
  }))
  .pipe(minifyCSS())
  .pipe(gulp.dest('wp/wp-content/themes/mindfulliving/css'));
});

gulp.task('watch', function() {
  gulp.watch('scss/*.scss',['compass']);
  livereload.listen();
  gulp.watch('www/**').on('change', livereload.changed);
});

gulp.task('imagemin', function() {
  return gulp.src('wp/wp-content/themes/mindfulliving/images/**/*')
    .pipe(cache(imagemin({ optimizationLevel: 6, progressive: true, interlaced: true })))
    .pipe(gulp.dest('wp/wp-content/themes/mindfulliving/images'));
});


gulp.task('default', ['watch','compass']);
