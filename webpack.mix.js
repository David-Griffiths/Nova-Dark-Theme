let mix = require('laravel-mix')

mix
    .js('resources/js/theme.js', 'dist/js')
    .sass('resources/sass/theme.scss', 'dist/css')