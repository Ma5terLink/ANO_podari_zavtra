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
    gulp.watch("src/app-include/*.php").on('all', gulp.parallel('php-include'));
    gulp.watch("src/app-controllers/*").on('all', gulp.parallel('php-ctrl'));
    gulp.watch("src/admin/**/*").on('all', gulp.parallel('php-admin'));
    gulp.watch("src/database/*").on('all', gulp.parallel('to-db'));
    gulp.watch("src/*.html").on('all', gulp.parallel('html'));
    gulp.watch("src/js/**/*.js").on('all', gulp.parallel('scripts'));
    gulp.watch("src/fonts/**/*").on('all', gulp.parallel('fonts'));
    gulp.watch("src/icons/**/*").on('all', gulp.parallel('icons'));
    gulp.watch("src/img/**/*").on('all', gulp.parallel('images'));

});

gulp.task('php', function () {
    return gulp.src("src/*.php")
        .pipe(gulp.dest("dist"));
});

gulp.task('php-include', function () {
    return gulp.src("src/app-include/*.php")
        .pipe(gulp.dest("dist/app/include"));
});

gulp.task('php-ctrl', function () {
    return gulp.src("src/app-controllers/*.php")
        .pipe(gulp.dest("dist/app/controllers"));
});

gulp.task('php-admin', function () {
    return gulp.src("src/admin/**/*.php")
        .pipe(gulp.dest("dist/admin"));
});

gulp.task('to-db', function () {
    return gulp.src("src/database/*")
        .pipe(gulp.dest("dist/app/database"));
});

gulp.task('html', function () {
    return gulp.src("src/*.html")
        // .pipe(htmlmin({ collapseWhitespace: true }))
        .pipe(gulp.dest("dist"));
    
});

gulp.task('scripts', function () {
    return gulp.src("src/js/**/*.js")
        .pipe(gulp.dest("dist/assets/js"))
        .pipe(browserSync.stream());
    
});

gulp.task('fonts', function () {
    return gulp.src("src/fonts/**/*")
        .pipe(gulp.dest("dist/assets/fonts"))
        .pipe(browserSync.stream());
});

gulp.task('icons', function () {
    return gulp.src("src/icons/**/*")
        .pipe(gulp.dest("dist/assets/icons"))
        .pipe(browserSync.stream());
});

gulp.task('mailer', function () {
    return gulp.src("src/mailer/**/*")
        .pipe(gulp.dest("dist/app/mailer"))
        .pipe(browserSync.stream());
});

gulp.task('images', function () {
    return gulp.src("src/img/**/*")
        .pipe(imagemin()) 
        .pipe(gulp.dest("dist/assets/img"))
        .pipe(browserSync.stream());
});

gulp.task('default', gulp.parallel('watch', 'server', 'styles', 'php', 'php-admin', 'php-include', 'php-ctrl', 'to-db', 'html', 'scripts', 'fonts', 'icons', 'mailer', 'images'));