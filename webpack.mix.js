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
mix.js(['packages/Inspirium/SKTemplate/src/assets/js/app.js'], 'public/js/app.js')
    .sass('packages/Inspirium/SKTemplate/src/assets/sass/app.scss', 'public/css/app.css')
    .copy('node_modules/jquery/dist/jquery.js', 'public/js/jquery.js')
    .copy('node_modules/popper.js/dist/umd/popper.js', 'public/js/popper.js')
    .copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js')
    .copy('node_modules/mdb-pro/js/mdb.js', 'public/js/mdb.js')
    .scripts([
        'node_modules/mdb-pro/js/modules (optional)/jquery.easing.js',
        'node_modules/mdb-pro/js/modules (optional)/velocity.min.js',
        'node_modules/mdb-pro/js/modules (optional)/chart.js',
        'node_modules/mdb-pro/js/modules (optional)/wow.js',
        'node_modules/mdb-pro/js/modules (optional)/scrolling-navbar.js',
        'node_modules/mdb-pro/js/modules (optional)/waves.js',
        'node_modules/mdb-pro/js/modules (optional)/forms-free.js',
        'node_modules/mdb-pro/js/modules (optional)/preloading.js',
        'node_modules/mdb-pro/js/modules (optional)/card-reveal.js',
        'node_modules/mdb-pro/js/modules (optional)/character-counter.js',
        'node_modules/mdb-pro/js/modules (optional)/toasts.js',
        'node_modules/mdb-pro/js/modules (optional)/smooth-scroll.js',
        'node_modules/mdb-pro/js/modules (optional)/dropdown.js',
        'node_modules/mdb-pro/js/modules (optional)/buttons.js',
        'node_modules/mdb-pro/js/modules (optional)/hammer.js',
        'node_modules/mdb-pro/js/modules (optional)/jquery.hammer.js',
        'node_modules/mdb-pro/js/modules (optional)/sideNav.js',
        'node_modules/mdb-pro/js/modules (optional)/collapsible.js',
        'node_modules/mdb-pro/js/modules (optional)/jquery.easypiechart.js',
        'node_modules/mdb-pro/js/modules (optional)/range-input.js',
        'node_modules/mdb-pro/js/modules (optional)/file-input.js',
        'node_modules/mdb-pro/js/modules (optional)/material-select.js',
        'node_modules/mdb-pro/js/modules (optional)/picker.js',
        'node_modules/mdb-pro/js/modules (optional)/picker-date.js',
        'node_modules/mdb-pro/js/modules (optional)/picker-time.js',
        'node_modules/mdb-pro/js/modules (optional)/lightbox.js',
        'node_modules/mdb-pro/js/modules (optional)/jquery.jsticky.js',
        'node_modules/mdb-pro/js/modules (optional)/scrollbar.js',
        'node_modules/mdb-pro/js/modules (optional)/chips.js',
        'node_modules/mdb-pro/js/modules (optional)/jarallax.js',
        'node_modules/mdb-pro/js/modules (optional)/jarallax-video.js',
        'node_modules/mdb-pro/js/modules (optional)/mdb-autocomplete.js'
    ], 'public/js/mdb.js');

