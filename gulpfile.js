var gulp = require('gulp');
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');

gulp.task('styles', function () {
    gulp.src('./sass/*.scss')
        .pipe(sass())
	.pipe(minifyCSS())
        .pipe(gulp.dest('./dist/css'));
});

gulp.task('watch', function() {

  // Watch .scss files
  gulp.watch('sass/**/*.scss', ['styles']);

});
