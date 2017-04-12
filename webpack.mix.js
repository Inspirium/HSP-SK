const { mix } = require('laravel-mix');

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
    .copy('node_modules/mdb-pro/js/mdb.js', 'public/js/mdb.js')
    .js([
        'packages/Inspirium/SKTemplate/src/assets/js/bootstrap.js',
        'packages/Inspirium/SKTemplate/src/assets/js/app.js'
    ], 'public/js/app.js')
    .sass('packages/Inspirium/SKTemplate/src/assets/sass/app.scss', 'public/css/app.css');
