const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

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

//elixir(mix => {
//    mix.sass('app.scss').webpack('app.js');
//
//
//});


elixir(function(mix){
    mix.sass('app.scss').

    styles([

        'libs/blog-post.css',
        'libs/bootstrap.css',
        'libs/bootstrap.min.css',
        'libs/font-awesome.css',
        'libs/metisMenu.css',
        'libs/sb-admin-2.css',
        'libs/styles.css'

    ], './public/css/Libs.css')

    .scripts([
        'libs/jquery.js',
        'libs/bootstrap.js',
        'libs/metisMenu.js',
        'libs/sb-admin-2.js',
        'libs/script.js'

        ],'./public/js/Libs.js');

});