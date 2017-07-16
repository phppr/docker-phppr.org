'use strict'

import pkg from './package.json'
import bourbon from 'node-bourbon'
import notify from 'gulp-notify'
import gutil from 'gulp-util'

const isProduction = gutil.env.type === 'production'

module.exports = {
  isProduction: isProduction,
  src: {
    sass: './sass',
    javascripts: './javascripts',
    images: './images',
    components: './node_modules'
  },
  dist: {
    css: `../themes/${pkg.name}/assets/css`,
    js: `../themes/${pkg.name}/assets/js`,
    images: `../themes/${pkg.name}/assets/images`,
    fonts: `../themes/${pkg.name}/assets/fonts`,
  },
  plumberErrorHandler: {
    errorHandler: notify.onError({
      title   : 'Gulp',
      message : 'Error: <%= error.message %>'
    })
  },
  cssnano: {
    reduceIdents: false,
    autoprefixer: {
      browsers: [
        'last 2 versions',
        'safari >= 8',
        'ie >= 10',
        'ff >= 20',
        'ios 6',
        'android 4'
      ], add: true
    }
  },
  includeConfig: {
    extensions: 'js',
    includePaths: [
      './node_modules',
      './javascripts'
    ]
  },
  sassConfig: {
    sourceComments: isProduction ? false : 'normal',
    includePaths: [
      bourbon.includePaths,
      './node_modules',
      './sass'
    ]
  },
  banner: [
    '/**!',
    '* <%= pkg.name %> - <%= pkg.description %>',
    '* @version v<%= pkg.version %>',
    '* @author v<%= pkg.author %>',
    '* @link <%= pkg.homepage %>',
    '* @license <%= pkg.license %>',
    '* @support <%= pkg.bugs.url %>',
    '*/'
  ]
}
