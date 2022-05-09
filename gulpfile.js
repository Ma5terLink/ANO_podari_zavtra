const gulp        = require('gulp');
const browserSync = require('browser-sync');
const sass = require('gulp-sass')(require('sass'));
const rename = require('gulp-rename');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const imagemin = require('gulp-imagemin');
const htmlmin = require('gulp-htmlmin');

// Static server
gulp.task('server', function() {
    browserSync({
        server: {
            baseDir: "dist"
        }
    });

    // gulp.watch("src/*.php").on('change', browserSync.reload);
    // gulp.watch("src/*.html").on('change', browserSync.reload);
    // gulp.watch("src/js/**/*.js").on('change', browserSync.reload);
    // gulp.watch("src/sass/**/*.scss").on('change', browserSync.reload);
     
});

gulp.task('styles', function()  {
    return  gulp.src("src/sass/**/*.+(scss|sass|css)")
            .pipe(sass())
            .pipe(gulp.dest("dist/assets/css"))
            .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
            .pipe(rename({
                prefix: "",
                suffix: ".min",
              }))
              .pipe(autoprefixer())
            .pipe(cleanCSS({compatibility: 'ie8'}))
            .pipe(gulp.dest("dist/assets/css"))
            .pipe(browserSync.stream());
});

gulp.task('watch', function()   {
    gulp.watch("src/sass/**/*.+(scss|sass|css)", gulp.parallel("styles"));
    gulp.watch("src/*.php").on('change', gulp.parallel('php'));
    gulp.watch("src/app/**/*").on('all', gulp.parallel('php-app'));
    gulp.watch("src/admin/**/*").on('all', gulp.parallel('php-admin'));
    gulp.watch("src/*.html").on('all', gulp.parallel('html'));
    gulp.watch("src/assets/js/**/*.js").on('all', gulp.parallel('scripts'));//перенос
    gulp.watch("src/fonts/**/*").on('all', gulp.parallel('fonts'));//перенос
    gulp.watch("src/assets/icons/**/*").on('all', gulp.parallel('icons'));//перенос
    gulp.watch("src/assets/img/**/*").on('all', gulp.parallel('images'));//перенос

});

gulp.task('php', function () {
    return gulp.src("src/*.php")
        .pipe(gulp.dest("dist"));
});

gulp.task('php-app', function () {
    return gulp.src("src/app/**/*")
        .pipe(gulp.dest("dist/app"));
});

gulp.task('php-admin', function () {
    return gulp.src("src/admin/**/*.php")
        .pipe(gulp.dest("dist/admin"));
});

gulp.task('html', function () {
    return gulp.src("src/*.html")
        // .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest("dist"));
    
});

gulp.task('scripts', function () { //перенос 
    return gulp.src("src/assets/js/**/*.js")
        .pipe(gulp.dest("dist/assets/js"))
        .pipe(browserSync.stream());
    
});

gulp.task('fonts', function () { //перенос 
    return gulp.src("src/assets/fonts/**/*")
        .pipe(gulp.dest("dist/assets/fonts"))
        .pipe(browserSync.stream());
});

gulp.task('icons', function () { //перенос 
    return gulp.src("src/assets/icons/**/*")
        .pipe(gulp.dest("dist/assets/icons"))
        .pipe(browserSync.stream());
});

gulp.task('images', function () { //перенос 
    return gulp.src("src/assets/img/**/*")
        .pipe(imagemin()) 
        .pipe(gulp.dest("dist/assets/img"))
        .pipe(browserSync.stream());
});

gulp.task('default', gulp.parallel('watch', 'server', 'styles', 'php', 'php-app', 'php-admin', 'html', 'scripts', 'fonts', 'icons', 'images'));