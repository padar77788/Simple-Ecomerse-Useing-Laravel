const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'public/frontend/old/css/bootstrap.min.css',
    'public/frontend/old/css/font-awesome.min.css',
    'public/frontend/old/css/line-awesome.min.css',
    'public/frontend/old/css/bootstrap-tagsinput.css',
    'public/frontend/old/css/jodit.min.css',
    'public/frontend/old/css/sweetalert2.min.css',
    'public/frontend/old/css/slick.css',
    'public/frontend/old/css/xzoom.css',
    'public/frontend/old/css/jquery.share.css',
    'public/frontend/old/css/active-shop.css',
    'public/frontend/old/css/spectrum.css',
    'public/frontend/old/css/custom-style.css',
    'public/frontend/old/css/fb-style.css',

], 'public/frontend/all/css/all.css');

mix.scripts([
    'public/frontend/js/vendor/jquery.min.js',
    'public/frontend/js/vendor/popper.min.js',
    'public/frontend/js/vendor/bootstrap.min.js',
    'public/frontend/js/jquery.countdown.min.js',
    'public/frontend/js/select2.min.js',
    'public/frontend/js/nouislider.min.js',
    'public/frontend/js/sweetalert2.min.js',
    'public/frontend/js/slick.min.js',
    'public/frontend/js/jquery.share.js'
], 'public/frontend/all/css/all.js');



