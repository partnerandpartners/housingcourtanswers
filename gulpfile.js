'use strict';
 
var gulp = require('gulp');
var less = require('gulp-less');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var path = require('path');
var webpack = require('gulp-webpack');


gulp.task('webpack', function() {
  return gulp.src('src/site.js')
    .pipe(webpack({
      watch: true
    }))
    .pipe(gulp.dest('dist/'));
});

 
gulp.task('buildVendorJS', function() {
  return gulp.src([
      './node_modules/mousetrap/mousetrap.min.js',
      './node_modules/lunr/lunr.min.js',
      './node_modules/validator/validator.js',
      // './node_modules/bootstrap/dist/js/bootstrap.js',
      './node_modules/fastclick/lib/fastclick.js',
      './node_modules/lazysizes/lazysizes.js'
    ])
    .pipe(concat('compiled.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js'));
});

gulp.task('less', function () {
  return gulp.src('./less/style.less')
    .pipe(less({
      compress: true
    }))
    .pipe(autoprefixer({ browsers: ['> 1%', 'IE 7'], cascade: false }))
    .pipe(gulp.dest('./css'));
});

gulp.task('less:watch', function () {
  gulp.watch('./less/**/*', ['less']);
});


gulp.task('copyBootstrapJS', function() {
  return gulp
    .src('./node_modules/bootstrap/assets/javascripts/bootstrap.min.js')
    .pipe(gulp.dest('js'));
})


gulp.task('build', [ 'copyBootstrapJS', 'less' ])

gulp.task('default', ['buildVendorJS', 'less', 'less:watch'])