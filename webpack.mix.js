let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
	.js('resources/assets/js/header.js', 'public/js/header.js')
	.js('resources/assets/js/top.js', 'public/js/top.js')
	.js('resources/assets/js/search.js', 'public/js/search.js')
	.scripts([
		'resources/assets/js/calendar/moment.js',
		'resources/assets/js/calendar/fullcalendar.min.js',
	], 'public/js/calendar.js')
	.sass('resources/assets/sass/app.scss', 'public/css')
	.styles([
		'resources/assets/css/bootstrap.min.css',
		'resources/assets/css/mdb.min.css',
		'resources/assets/css/nice-select.css',
		'resources/assets/css/magic-suggest-min.css',
		'resources/assets/css/fullcalendar.min.css',
	], 'public/css/material.css');
