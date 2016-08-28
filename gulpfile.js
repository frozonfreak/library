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

elixir(function(mix) {
    mix.styles([
            'material.min.css',
            'main.css',
            'login.css',
            'style.css'
        ], 'public/assets/css/master.css');

    mix.styles([
            'material.min.css',
            'dashboard.css'
        ], 'public/assets/css/dashboard.css');

    mix.version(['assets/css/master.css','assets/css/dashboard.css']);
});
