const { src, dest, parallel, series } = require('gulp');

const rename = require('gulp-rename');

const minify = require('gulp-minify-css');
const uglify = require('gulp-uglify');
const phpsri = require('gulp-sri-php');
const replace = require('gulp-replace');

function minifyCSS() {
    return src('css/*.css', { ignore: 'css/*.min.css' })
        .pipe(minify())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(dest('css/'));
}

function minifyJS() {
    return src('js/*.js', { ignore: 'js/*.min.js' })
        .pipe(uglify())
        .pipe(rename({ extname: '.min.js' }))
        .pipe(dest('js/'));
}

function removeIntegrityAttributes() {
    return src('**/*.php', { ignore: 'vendor/**/*.php' })
        .pipe(replace(/ integrity="[a-zA-Z\- 0-9+/=]*"/g, ''))
        .pipe(dest('.'));
}

function phpSri() {
    return src('**/*.php', { ignore: 'vendor/**/*.php' })
    .pipe(phpSri(/ integrity="[a-zA-Z\- 0-9+/=]*"/g, ''))
    .pipe(dest('.'));
}

exports.default = series(parallel(minifyCSS, minifyJS), removeIntegrityAttributes, phpSri);
