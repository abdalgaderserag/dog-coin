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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/response.js', 'public/js')
    .js('resources/js/vueComponent.js', 'public/js')

    .js('resources/js/io.js', 'public/js')

    .sass('resources/sass/dashboard.scss', 'public/css')
    .sass('resources/sass/profile.scss', 'public/css')
    .sass('resources/sass/edit-profile.scss', 'public/css')
    .sass('resources/sass/request.scss', 'public/css')
    .sass('resources/sass/favorite.scss', 'public/css')

    .sass('resources/sass/auth/login.scss', 'public/css/auth')
    .sass('resources/sass/auth/register.scss', 'public/css/auth')

    .sass('resources/sass/home/home.scss', 'public/css')


    .sass('resources/sass/parts/footer.scss', 'public/css')
    .sass('resources/sass/parts/left.scss', 'public/css')
    .sass('resources/sass/parts/transfer.scss', 'public/css')

    .sass('resources/sass/app.scss', 'public/css');
