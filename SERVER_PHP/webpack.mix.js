const browserSync = require('browser-sync');
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

mix
    /// js client
    .js('resources/js/client/app.js', 'public/js')
    .js('resources/js/client/home.js', 'public/js')

    /// css client
    .sass('resources/sass/client/page/main.scss', 'public/css')
    .sass('resources/sass/client/app.scss', 'public/css')
    .sass('resources/sass/client/page/home.scss', 'public/css')
    .sass('resources/sass/client/page/weHomes.scss', 'public/css')
    .sass('resources/sass/client/page/post-detail.scss', 'public/css')
    .sass('resources/sass/client/page/abcxyz.scss', 'public/css')

    /// css admin
    // .sass('resources/sass/admin/index.scss', 'public/css/admin.min.css')

    /// js admin 
    // .js('resources/js/admin/app-webpack.js', 'public/js/admin/app-webpack.min.js')

    .browserSync('http://thanhthien.jp/')
mix.disableNotifications();