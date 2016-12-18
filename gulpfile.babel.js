'use strict';

import Gulp    from 'gulp';
import Plugins from 'gulp-load-plugins';
import Bourbon from 'node-bourbon';

const $ = Plugins();
const isProduction = $.util.env.type === 'production' ? true : false;
const browsers = ['last 2 versions'];
const config = {
  sass: './assets/sass',
  css: './assets/css',
  js: './assets/js',
  plumberErrorHandler: {
    errorHandler: $.notify.onError({
      title   : 'Gulp',
      message : 'Error: <%= error.message %>'
    })
  }
};

Gulp.task('stylesheets', () => {
  return Gulp.src([`${config.sass}/*.sass`])
    .pipe($.plumber(config.plumberErrorHandler))
    .pipe($.sass({
      sourceComments: isProduction ? false : 'normal',
      includePaths: [
        config.sass,
        Bourbon.includePaths
      ]
    }))
    .pipe($.autoprefixer({ browsers }))
    .pipe($.combineMq())
    .pipe(isProduction ? $.cssnano() : $.jsbeautifier({indentSize: 2}))
    .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
    .pipe($.size({ title: 'Build and Minify Stylesheets', gzip: false, showFiles: true }))
    .pipe(Gulp.dest(config.css))
    .pipe($.plumber.stop());
})

.task('watch', ['stylesheets'], () => {
  Gulp.watch(`${config.sass}/**/*.{sass,scss}`, ['stylesheets']);
})

.task('default', [ 'watch' ]);
