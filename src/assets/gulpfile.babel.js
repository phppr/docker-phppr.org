'use strict'

import pkg from './package.json'
import gulp from 'gulp'
import plugins from 'gulp-load-plugins'
import bourbon from 'node-bourbon'

const $ = plugins()
const isProduction = $.util.env.type === 'production' ? true : false
const browsers = ['last 2 versions']
const config = {
  src: './',
  sass: './sass',
  javascripts: './javascripts',
  images: './images',
  components: './node_modules',
  dist: {
    css: `../themes/${pkg.name}/assets/css`,
    js: `../themes/${pkg.name}/assets/js`,
    images: `../themes/${pkg.name}/assets/images`,
    fonts: `../themes/${pkg.name}/assets/fonts`,
  },
  plumberErrorHandler: {
    errorHandler: $.notify.onError({
      title   : 'Gulp',
      message : 'Error: <%= error.message %>'
    })
  }
}

gulp.task('stylesheets', () => gulp.src([`${config.sass}/*.sass`])
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.sass({
    sourceComments: isProduction ? false : 'normal',
    includePaths: [
      bourbon.includePaths,
      `${config.components}`,
      `${config.sass}`
    ]
  }))
  .pipe($.autoprefixer({ browsers }))
  .pipe($.combineMq())
  .pipe(isProduction ? $.cssnano() : $.jsbeautifier({ indentSize: 2 }))
  .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
  .pipe($.size({ title: 'Build Stylesheets', gzip: false, showFiles: true }))
  .pipe(gulp.dest(config.dist.css))
  .pipe($.plumber.stop()))

gulp.task('scripts', () => gulp.src([`${config.javascripts}/*.js`])
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.include({
    extensions: 'js',
    includePaths: [
      `${config.components}`,
      `${config.javascripts}`
    ]
  }))
  .pipe(isProduction ? $.uglify() : $.util.noop())
  .pipe(isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
  .pipe($.size({ title: 'Build javascripts', gzip: false, showFiles: true }))
  .pipe(gulp.dest(config.dist.js))
  .pipe($.plumber.stop()))

gulp.task('images', () => gulp.src(`${config.images}/**/*`)
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.cache($.imagemin()))
  .pipe($.size({ title: 'Compress image', gzip: false, showFiles: true }))
  .pipe(gulp.dest(config.dist.images)))

gulp.task('fonts', () => gulp.src(`${config.components}/font-awesome/fonts/*`)
  .pipe($.size({ title: 'Font Awesome!', gzip: false, showFiles: true }))
  .pipe(gulp.dest(config.dist.fonts)))

gulp.task('build', [ 'stylesheets', 'scripts', 'images', 'fonts' ])

gulp.task('watch', ['build'], () => {
  gulp.watch(`${config.sass}/**/*`, ['stylesheets'])
  gulp.watch(`${config.javascripts}/**/*`, ['scripts'])
})

gulp.task('default', [ 'watch' ])
