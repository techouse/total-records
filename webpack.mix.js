const mix = require('laravel-mix').mix

mix.setPublicPath('dist')
   .js('resources/js/card.js', 'js')
   .sass('resources/sass/card.scss', 'css')
   .version()
