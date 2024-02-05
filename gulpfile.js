const { src, dest, parallel, series } = require('gulp');

const rename = require('gulp-rename');

const csso = require('gulp-csso');
const uglify = require('gulp-uglify');
const phpsri = require('gulp-sri-php');

function minifyCSS() {
    return src('css/*.css', { ignore: 'css/*.min.css' })
        .pipe(csso())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(dest('css/'));
}

function minifyJS() {
    return src('js/*.js', { ignore: 'js/*.min.js' })
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest('js/'));
}

function phpSri() {
    return src('**/*.php')
       .pipe(phpsri())
       .pipe(dest('.'));
}

exports.default = series(parallel(minifyCSS, minifyJS), phpSri);
