/*
 * Laravel Mix
 *
 * Check the documentation at
 * https://laravel-mix.com/
 */

let mix = require( 'laravel-mix' );
require('laravel-mix-copy-watched');

// Autloading jQuery to make it accessible to all the packages.
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix.setPublicPath( './public' );

mix.disableSuccessNotifications();

// Compile assets.
mix.js( 'resources/scripts/app.js', 'public/js' )
	.js( 'resources/scripts/admin.js', 'public/js' )
	.postCss( 'resources/styles/style.css', 'public/css' )
	.postCss( 'resources/styles/admin.css', 'public/css' )
	.copyWatched( 'resources/fonts', 'public/fonts', { base: 'resources/fonts'} )
	.copyWatched( 'resources/icons', 'public/icons', { base: 'resources/icons' } )
	.copyWatched( 'resources/images', 'public/images', { base: 'resources/images' } );

mix.browserSync('classic-bp.test');

// Add source map and versioning to assets in production environment.
if ( mix.inProduction() ) {
	mix.sourceMaps().version();
}
