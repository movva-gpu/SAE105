const { src, dest, parallel, series } = require('gulp');

const rename = require('gulp-rename');

const minify = require('gulp-minify-css');
const uglify = require('gulp-uglify');
const replace = require('gulp-replace');
const { copyFile } = require('graceful-fs');

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

function minifyPHP() {
    return src('**/*.php', { ignore: 'vendor/**/*' })
        .pipe(dest('copy/'))
        .pipe(replace(/^(?!https:\/\/)\/\/.*/gm, ''))
        .pipe(replace(/\/\*[\*]?[\s\S\n\r]*\*\//g, ''))
        .pipe(replace(/\r\n/g, ' '))
        .pipe(replace('    ', ' '))
        .pipe(replace('   ', ' '))
        .pipe(replace('  ', ' '))
        .pipe(dest('.'));
}

exports.default = parallel(minifyCSS, minifyJS);
exports.build = parallel(minifyCSS, minifyJS, minifyPHP)
