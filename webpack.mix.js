let mix = require('laravel-mix');

mix.browserSync({
	proxy: 'localhost/ywig-theme',
	files: [
		'**/*.php',
		'dist/css/**/*.css',
		'dist/js/**/*.js'
	],
	injectChanges: true,
	open: false
});

mix.js('src/js/app.js', 'dist/js')
.js('src/js/front.js', 'dist/js')
.js('src/js/admin.js', 'dist/js')
.sass('src/scss/app.scss', 'dist/css')
.sass('src/scss/admin.scss', 'dist/css')


