'use strict'

import pkg from './package.json'
import config from './gulp.config'
import gulp from 'gulp'
import plugins from 'gulp-load-plugins'
import bourbon from 'node-bourbon'

const $ = plugins()

gulp.task('stylesheets', () => gulp.src([`${config.src.sass}/*.sass`])
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.sass(config.sassConfig))
  .pipe($.combineMq())
  .pipe(config.isProduction ? $.cssnano(config.cssnano) : $.jsbeautifier({ indentSize: 2 }))
  .pipe(config.isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
  .pipe($.size({ title: 'Build Stylesheets', showFiles: true }))
  .pipe(gulp.dest(config.dist.css))
  .pipe($.plumber.stop()))

gulp.task('scripts', () => gulp.src([`${config.src.javascripts}/*.js`])
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe($.include(config.includeConfig))
  .pipe(config.isProduction ? $.uglify() : $.util.noop())
  .pipe(config.isProduction ? $.rename({ suffix: '.min' }) : $.util.noop())
  .pipe($.size({ title: 'Build javascripts', showFiles: true }))
  .pipe(gulp.dest(config.dist.js))
  .pipe($.plumber.stop()))

gulp.task('images', () => gulp.src(`${config.src.images}/**/*`)
  .pipe($.plumber(config.plumberErrorHandler))
  .pipe(config.isProduction ? $.cache($.imagemin()) : $.util.noop())
  .pipe($.size({ title: 'Compress image', showFiles: true }))
  .pipe(gulp.dest(config.dist.images)))

gulp.task('fonts', () => gulp.src(`${config.src.components}/font-awesome/fonts/*`)
  .pipe($.size({ title: 'Font Awesome!', showFiles: true }))
  .pipe(gulp.dest(config.dist.fonts)))

gulp.task('build', [ 'stylesheets', 'scripts', 'images', 'fonts' ])

gulp.task('watch', ['build'], () => {
  gulp.watch(`${config.src.sass}/**/*`, ['stylesheets'])
  gulp.watch(`${config.src.javascripts}/**/*`, ['scripts'])
})

gulp.task('default', [ 'watch' ])
