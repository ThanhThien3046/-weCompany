var gulp         = require('gulp')
var sass         = require('gulp-sass')
var livereload   = require('gulp-livereload')
var minify       = require('gulp-minify')
// var minifyCss    = require('gulp-minify-css')
var path         = require('path')
var rename       = require("gulp-rename")
var cache        = require('gulp-cached')
// var autoprefixer = require('gulp-autoprefixer')
var postcss      = require('gulp-postcss')
var autoprefixer = require('autoprefixer')
var cssnano      = require('cssnano')


const PLUGINS = [
   autoprefixer,
   cssnano
];


gulp.task('JS_CLIENT', () => {
   return gulp.src('./CLIENT/JAVASCRIPT/*.js')
   .pipe(cache('linting'))
   .pipe(minify({
      ext: {
         min: '.min.js'
      },
      noSource: true
   }))
   // .pipe(rename({ suffix: '.min' }))
   .pipe(gulp.dest(path.join(__dirname, '/../SERVER_PHP/public/js/' )))
});

gulp.task('CSS_CLIENT', () => {
   console.log("vào CSS_CLIENT")
   return gulp.src('./CLIENT/SCSS/page/*.scss')
      // .pipe(autoprefixer())
      .pipe(cache('linting'))
      .pipe(sass())
      .pipe(postcss(PLUGINS))
      // .pipe(minifyCss({ compatibility: 'ie8', keepSpecialComments : 0 }))
      // .pipe(rename({ suffix: '.min' }))
      .pipe(gulp.dest(path.join(__dirname, '/../SERVER_PHP/public/css/')))
});


// Watch Files For Changes
gulp.task('watch', function () {

   gulp.watch('./CLIENT/SCSS/*.scss', gulp.series('CSS_CLIENT'))
   gulp.watch('./CLIENT/SCSS/*/*.scss', gulp.series('CSS_CLIENT'))
   gulp.watch('./CLIENT/SCSS/*/*/*.scss', gulp.series('CSS_CLIENT'))

   gulp.watch([
      './CLIENT/JAVASCRIPT/*.js'
   ], gulp.series('JS_CLIENT'))

})
