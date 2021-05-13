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

<<<<<<< HEAD
mix.js('resources/js/app.js', 'public/js')
.vue()
.postCss('resources/css/app.css', 'public/css', [
=======
mix.js('resources/js/app.js', 'public/js').vue().postCss('resources/css/app.css', 'public/css', [
>>>>>>> 789ccec25b1c27c36d20d5688e33faca200d3fd4
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
    
]);
