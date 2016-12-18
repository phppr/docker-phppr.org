'use strict';

import Gulp    from 'gulp';
import Plugins from 'gulp-load-plugins';
import Bourbon from 'node-bourbon';

const $ = Plugins();
const isProduction = $.util.env.type === 'production' ? true : false;
const browsers = ['last 2 versions'];
const config = {
  src: './assets/src',
  css: './assets/css',
  js: './assets/js',
  images: './assets/img',
  plumberErrorHandler: {
    errorHandler: $.notify.onError({
      title   : 'Gulp',
      message : 'Error: <%= error.message %>'
    })
  }
};

Gulp.task('stylesheets', () => {
  return Gulp.src([`${config.src}/sass/*.sass`])
    .pipe($.plumber(config.plumberErrorHandler))
    .pipe($.sass({
      sourceComments: isProduction ? false : 'normal',
      includePaths: [
        Bourbon.includePaths,
        'assets/src/components',
        'assets/src/sass'
      ]
    }))
    .pipe($.autoprefixer({ browsers }))
    .pipe($.combineMq())
    .pipe(isProduction ? $.cssnano() : $.jsbeautifier({ indentSize: 2 }))
    .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
    .pipe($.size({ title: 'Build Stylesheets', gzip: false, showFiles: true }))
    .pipe(Gulp.dest(config.css))
    .pipe($.plumber.stop());
});

Gulp.task('scripts', () => {
  return Gulp.src([`${config.src}/javascripts/*.js`])
    .pipe($.plumber(config.plumberErrorHandler))
    .pipe($.include({
      extensions: 'js',
      includePaths: [
        'node_modules',
        'assets/src/components',
        'assets/src/javascripts'
      ]
    }))
    .pipe(isProduction ? $.uglify() : $.util.noop())
    .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
    .pipe($.size({ title: 'Build javascripts', gzip: false, showFiles: true }))
    .pipe(Gulp.dest(config.js))
    .pipe($.plumber.stop());
});

Gulp.task('images', function () {
  return Gulp.src(`${config.src}/images/**/*`)
    .pipe($.cache($.imagemin()))
    .pipe($.size({ title: 'Compress image', gzip: false, showFiles: true }))
    .pipe(Gulp.dest(config.images));
});

Gulp.task('watch', ['stylesheets', 'scripts'], () => {
  Gulp.watch(`${config.src}/sass/**/*`, ['stylesheets']);
  Gulp.watch(`${config.src}/javascripts/**/*`, ['scripts']);
});

Gulp.task('default', [ 'watch' ]);
