var gulp         = require('gulp')
var sass         = require('gulp-sass')
var livereload   = require('gulp-livereload')
var minify       = require('gulp-minify')
var minifyCss    = require('gulp-minify-css')
var path         = require('path')
var rename       = require("gulp-rename")
var cache        = require('gulp-cached')
// var autoprefixer = require('gulp-autoprefixer')

gulp.task('JS_ADMIN', () => {
   return gulp.src('./ADMIN/JAVASCRIPT/*.js')
   .pipe(cache('linting'))
   .pipe(minify({
      ext: {
         min: '.min.js'
      },
      noSource: true
   }))
   // .pipe(rename({ suffix: '.min' }))
   .pipe(gulp.dest(path.join(__dirname, '/../SERVER_PHP/public/js/admin/' )))
   .pipe(livereload())
});

gulp.task('CSS_ADMIN', () => {
   return gulp.src('./ADMIN/SCSS/index.scss')
      .pipe(sass())
      .pipe(minifyCss({ compatibility: 'ie8', keepSpecialComments : 0 }))
      .pipe(rename({ suffix: '.min', basename: "admin" }))
      .pipe(gulp.dest(path.join(__dirname, '/../SERVER_PHP/public/css/')))
      .pipe(livereload())
})

// Watch Files For Changes
gulp.task('watch', function () {
   livereload.listen()
   gulp.watch('./ADMIN/SCSS/*.scss', gulp.series('CSS_ADMIN'))
   gulp.watch('./ADMIN/SCSS/*/*.scss', gulp.series('CSS_ADMIN'))
   gulp.watch('./ADMIN/SCSS/*/*/*.scss', gulp.series('CSS_ADMIN'))

   gulp.watch([
      './ADMIN/JAVASCRIPT/*.js',
   ], gulp.series('JS_ADMIN'))
})
