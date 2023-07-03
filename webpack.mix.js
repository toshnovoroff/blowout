const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);

mix.js('resources/js/account.js', 'public/js')
    .js('resources/js/booking.js', 'public/js')
    .js('resources/js/index.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .js('resources/js/products.js', 'public/js')
    .js('resources/js/review.js', 'public/js')
    .js('resources/js/script.js', 'public/js')
    .js('resources/js/signup.js', 'public/js')
    .js('resources/js/addmodal.js', 'public/js')
    .sass('resources/sass/index.sass', 'public/css')
    .sass('resources/sass/account.sass', 'public/css')
    .sass('resources/sass/auth.sass', 'public/css')
    .sass('resources/sass/booking.sass', 'public/css')
    .sass('resources/sass/loyalty.sass', 'public/css')
    .sass('resources/sass/product.sass', 'public/css')
    .sass('resources/sass/products.sass', 'public/css')
    .sass('resources/sass/reviews.sass', 'public/css')
    .sass('resources/sass/style.sass', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');