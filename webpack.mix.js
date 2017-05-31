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
    .copy('node_modules/tether/dist/js/tether.js', 'public/js/tether.js')
    .copy('node_modules/bootstrap/dist/js/bootstrap.js', 'public/js/bootstrap.js')
    .scripts([
        'node_modules/mdb-pro/js/modules (optional)/jquery-easing.js',
        'node_modules/mdb-pro/js/modules (optional)/global.js',
        'node_modules/mdb-pro/js/modules (optional)/velocity.min.js',
        'node_modules/mdb-pro/js/modules (optional)/chart.js',
        'node_modules/mdb-pro/js/modules (optional)/wow.js',
        'node_modules/mdb-pro/js/modules (optional)/scrolling-nav.js',
        'node_modules/mdb-pro/js/modules (optional)/waves.js',
        'node_modules/mdb-pro/js/modules (optional)/preloading.js',
        'node_modules/mdb-pro/js/modules (optional)/card-reveal.js',
        'node_modules/mdb-pro/js/modules (optional)/toasts.js',
        'node_modules/mdb-pro/js/modules (optional)/smooth-scroll.js',
        'node_modules/mdb-pro/js/modules (optional)/dropdown.js',
        'node_modules/mdb-pro/js/modules (optional)/rotating-cards.js',
        'node_modules/mdb-pro/js/modules (optional)/buttons.js',
        'node_modules/mdb-pro/js/modules (optional)/hammer.js',
        'node_modules/mdb-pro/js/modules (optional)/jquery.hammer.js',
        'node_modules/mdb-pro/js/modules (optional)/sideNav.js',
        'node_modules/mdb-pro/js/modules (optional)/collapsible.js',
        'node_modules/mdb-pro/js/modules (optional)/jquery.easypiechart.js',
        'node_modules/mdb-pro/js/modules (optional)/panel-popuot.js',
        'packages/Inspirium/SKTemplate/src/assets/js/forms.js',
        'node_modules/mdb-pro/js/modules (optional)/picker.js',
        'node_modules/mdb-pro/js/modules (optional)/picker-date.js',
        'node_modules/mdb-pro/js/modules (optional)/picker-time.js',
        'node_modules/mdb-pro/js/modules (optional)/lightbox.js',
        'node_modules/mdb-pro/js/modules (optional)/jquery.jsticky.js',
        'node_modules/mdb-pro/js/modules (optional)/scrollbar.js',
        'node_modules/mdb-pro/js/modules (optional)/animations.js',
        'node_modules/mdb-pro/js/modules (optional)/chips.js',
        'node_modules/mdb-pro/js/modules (optional)/autocomplete.js',
        /*
        'node_modules/mdb-pro/js/modules (optional)/forms-basic.js',

        'node_modules/mdb-pro/js/modules (optional)/character-counter.js',



        'node_modules/mdb-pro/js/modules (optional)/smooth-scroll.js',
        'node_modules/mdb-pro/js/modules (optional)/video-bg.js',*/
    ], 'public/js/mdb.js');
