const mix = require('laravel-mix');

const WebpackRTLPlugin = require('webpack-rtl-plugin');

mix.setPublicPath('./public');

mix.js('resources/assets/js/auth.js', 'public/js')
    .js('resources/assets/js/admin-lte.js', 'public/js')
    .extract([
      'lodash', 'jquery', 'bootstrap-sass',
      'fastclick', 'jquery-slimscroll', 'admin-lte',
      'vue', 'axios'
    ], 'public/js/vendor.js')
    .autoload({
      jquery: ['$', 'jQuery', 'jquery'],
    });

mix.sass('resources/assets/sass/auth.scss', 'public/css')
    .sass('resources/assets/sass/admin-lte.scss', 'public/css')
    .options({ processCssUrls: false });

mix.webpackConfig({
  plugins: [
    new WebpackRTLPlugin(),
  ],
});