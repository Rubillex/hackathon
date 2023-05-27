const mix = require('laravel-mix');
const path = require('path');

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
console.log(path.resolve(__dirname) + '/resources/js');

mix.js('resources/js/app.js', 'public/js')
    .ts('resources/js/app.ts', 'public/ts')
    .vue()
    .less('resources/css/style.less', 'public/css')
    .webpackConfig({
        resolve: {
            extensions: ['.ts', '.js'],
            alias: {
                '~': path.resolve(__dirname) + 'resources/js',
                '@': path.resolve(__dirname) + 'resources/js',
            },
        },
    });
