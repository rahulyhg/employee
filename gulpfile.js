var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.sass('resources/assets/sass/style.scss', 'public/assets/css');
});

elixir(function (mix) {
    mix.browserify('resources/assets/js/main.js', 'public/assets/js/main.js');
    mix.browserify('resources/assets/js/form.js', 'public/assets/js/form.js');
});