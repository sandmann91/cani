// Requirements
const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const del = require('del');
const rename = require("gulp-rename");
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');


function css() {

    var src = [
        'src/css/**/*.css'
    ];
    return gulp.src(src)

        // 
        .pipe(concat('style.css'))

        // Dafür sorgen, dass alle in ein Verzeichnis geschrieben werden
        .pipe(rename({ dirname: '' }))

        // In Destination verschieben
        .pipe(gulp.dest('./dist/assets'));
}


function style() {

    // Rückgabe
    return gulp.src('./src/scss/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./dist/assets/'));
}

function js() {

    var src = [
        'src/js/**/*.js'
    ];

    return gulp.src(src)

        // Dafür sorgen, dass alle in ein Verzeichnis geschrieben werden
        .pipe(rename({ dirname: '' }))

        // In Destination verschieben
        .pipe(gulp.dest('./dist/assets'));
}

function pages() {

    var src = [
        'src/pages/**/*.*',
        'src/pages/.htaccess'
    ];

    return gulp.src(src)

        // Dafür sorgen, dass alle in ein Verzeichnis geschrieben werden
        .pipe(rename({ dirname: '' }))

        // In Destination verschieben
        .pipe(gulp.dest('./dist'));
}


function img() {

    var src = [
        'src/img/**/*.*'
    ];

    return gulp.src(src)

        // Dafür sorgen, dass alle in ein Verzeichnis geschrieben werden
        .pipe(rename({ dirname: '' }))

        // In Destination verschieben
        .pipe(gulp.dest('./dist/assets/img'));
}


function startWatch() {

    // BrowserSync
    browserSync.init({
        proxy: 'http://cani.localhost/'
    });

    // Überwacht die JS Ordner
    gulp.watch(['./src/**', '!./src/sass/**', '!./src/js/**', '!./src/pages/**']).on('change', gulp.series(['build', browserSync.reload]));
    gulp.watch('./src/sass/**/*.scss').on('change', gulp.series(['style', browserSync.reload]));
    gulp.watch('./src/js/**/.js').on('change', gulp.series(['js', browserSync.reload]));
    gulp.watch('./src/pages/**').on('change', gulp.series(['pages', browserSync.reload]));
}

function copyVendorJs() {

    // JavaScript Dependencys
    var jsArray = [
        './node_modules/moment/min/moment-with-locales.min.js',
        './node_modules/jquery/dist/jquery.min.js',
        './node_modules/@popperjs/core/dist/umd/popper.min.js',
        './node_modules/bootstrap/dist/js/bootstrap.min.js',
    ];

    // Rückgabe
    return gulp.src(jsArray)
        .pipe(concat('vendor.min.js'))
        .pipe(gulp.dest('./dist/assets'));
}
function copyVendorCss() {
    
    // CSS Kopieren
    var cssArray = [
        './node_modules/bootstrap/dist/css/bootstrap.min.css',
    ];

    // Rückgabe
    return gulp.src(cssArray)
        .pipe(concat('vendor.min.css'))
        .pipe(gulp.dest('./dist/assets'));
}




function clear() {
    return del(['./dist/**','!./dist/img']);
}


// Tasks exportieren
exports.clear = clear;
exports.js = js;
exports.img = img;
exports.style = style;
exports.css = css;
exports.pages = pages;
exports.copyVendorJs = copyVendorJs;
exports.copyVendorCss = copyVendorCss;
exports.startWatch = startWatch;

exports.build = gulp.series(clear, style, js, img, pages, copyVendorJs, copyVendorCss);
exports.watch = gulp.series(clear, style, js, img, pages, copyVendorJs, copyVendorCss, startWatch);
