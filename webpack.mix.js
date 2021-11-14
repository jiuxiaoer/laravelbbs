const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css')
  .version()
  .copyDirectory('resources/editor/js', 'public/js')
  .copyDirectory('resources/editor/css', 'public/css')
  .copyDirectory('resources/reply/js', 'public/js')
  .copyDirectory('resources/reply/css', 'public/css')
  .copyDirectory('resources/editor/images', 'public/images')
  .copyDirectory('resources/editor/plugins', 'public/js/plugins')
  .copyDirectory('resources/editor/fonts', 'public/fonts');
