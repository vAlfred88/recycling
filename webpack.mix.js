const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/front/app.js', 'public/js/front')
    .sass('resources/sass/app.scss', 'public/css')
    .postCss('resources/css/tailwind.css', 'public/css')
    .tailwind()
    .purgeCss();

if (mix.inProduction()) {
    mix.version();
}
