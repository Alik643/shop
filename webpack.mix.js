let mix = require('laravel-mix');
mix.webpackConfig({
    stats: {
        children: true,
    },
});
mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/jquery-3.7.1.min.js', 'public/js/jquery-3.7.1.min.js')
    .css('resources/css/app.css', 'public/css')
    .copyDirectory('resources/fonts', 'public/fonts');
