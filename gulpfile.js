var gulp = require('gulp');
var plugins = require('gulp-load-plugins')();

gulp.task('js', function () {
    return gulp.src(['public/lib/font-awesome/svg-with-js/js/fontawesome-all.js','public/lib/jquery/dist/jquery.min.js','public/lib/animatelo/dist/animatelo.min.js','public/lib/datatables.net/js/jquery.dataTables.min.js','public/lib/bootstrap/dist/js/bootstrap.js','public/lib/angular/angular.min.js','public/lib/angularUtils-pagination/dirPagination.js','public/js/controllers/*.js'])
        .pipe(plugins.concat('app.js'))
        .pipe(plugins.uglify())
        .pipe(gulp.dest('public/dist/js'))
});
gulp.task('watch', function () {
    return gulp.watch(['public/js/controllers/*.js'],['js']);
});
gulp.task('default',['watch','js']);


