'use strict';

import Gulp    from 'gulp';
import Plugins from 'gulp-load-plugins';
import Bourbon from 'node-bourbon';

const $ = Plugins();
const isProduction = $.util.env.type === 'production' ? true : false;
const browsers = ['last 2 versions'];
const config = {
  src: './',
  sass: './sass',
  components: './components',
  css: '../themes/phppr/assets/css',
  js: '../themes/phppr/assets/js',
  images: '../themes/phppr/assets/images',
  fonts: '../themes/phppr/assets/fonts',
  plumberErrorHandler: {
    errorHandler: $.notify.onError({
      title   : 'Gulp',
      message : 'Error: <%= error.message %>'
    })
  }
};

Gulp.task('stylesheets', () => Gulp.src([`${config.sass}/*.sass`])
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.sass({
    sourceComments: isProduction ? false : 'normal',
    includePaths: [
      Bourbon.includePaths,
      `${config.components}`,
      `${config.sass}`
    ]
  }))
  .pipe($.autoprefixer({ browsers }))
  .pipe($.combineMq())
  .pipe(isProduction ? $.cssnano() : $.jsbeautifier({ indentSize: 2 }))
  .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
  .pipe($.size({ title: 'Build Stylesheets', gzip: false, showFiles: true }))
  .pipe(Gulp.dest(config.css))
  .pipe($.plumber.stop()));

Gulp.task('scripts', () => Gulp.src([`${config.src}/javascripts/*.js`])
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.include({
    extensions: 'js',
    includePaths: [
      'node_modules',
      `${config.components}`,
      `${config.src}/javascripts`
    ]
  }))
  .pipe(isProduction ? $.uglify() : $.util.noop())
  .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
  .pipe($.size({ title: 'Build javascripts', gzip: false, showFiles: true }))
  .pipe(Gulp.dest(config.js))
  .pipe($.plumber.stop()));

Gulp.task('images', () => Gulp.src(`${config.src}/images/**/*`)
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.cache($.imagemin()))
  .pipe($.size({ title: 'Compress image', gzip: false, showFiles: true }))
  .pipe(Gulp.dest(config.images)));

Gulp.task('fonts', () => Gulp.src(`${config.components}/font-awesome/fonts/*`)
  .pipe($.size({ title: 'Font Awesome!', gzip: false, showFiles: true }))
  .pipe(Gulp.dest(config.fonts)));

Gulp.task('build', [ 'stylesheets', 'scripts', 'images', 'fonts' ]);

Gulp.task('watch', ['build'], () => {
  Gulp.watch(`${config.sass}/**/*`, ['stylesheets']);
  Gulp.watch(`${config.src}/javascripts/**/*`, ['scripts']);
});

Gulp.task('default', [ 'watch' ]);
