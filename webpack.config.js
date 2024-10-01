const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );
const RemoveEmptyScriptsPlugin = require( 'webpack-remove-empty-scripts' );
const path = require( 'path' );

module.exports = {
	...defaultConfig,
	entry: {
		...defaultConfig.entry(),
		'js/admin': [ path.resolve( __dirname, './src/scripts/admin.js' ) ],
		'js/editor': [ path.resolve( __dirname, './src/scripts/editor.js' ) ],
		'js/frontend': [
			path.resolve( __dirname, './src/scripts/frontend.js' ),
		],
		'css/admin': [ path.resolve( __dirname, './src/styles/admin.css' ) ],
		'css/editor': [ path.resolve( __dirname, './src/styles/editor.css' ) ],
		'css/frontend': [
			path.resolve( __dirname, './src/styles/frontend.css' ),
		],
	},
	plugins: [
		...defaultConfig.plugins,
		new CopyWebpackPlugin( {
			patterns: [
				{
					from: './src/fonts/',
					to: './fonts/',
				},
				{
					from: './src/icons/',
					to: './icons/',
				},
				{
					from: './src/images/',
					to: './images/',
				},
			],
		} ),
		new RemoveEmptyScriptsPlugin( {
			stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
		} ),
	],
	module: {
		rules: [
			...defaultConfig.module.rules,
			{
				// Re-declare the rules for image assets.
				// the .[hash:8] was removed to prevent duplication.
				test: /\.(bmp|png|jpe?g|gif|webp)$/i,
				type: 'asset/resource',
				generator: {
					filename: 'images/[name][ext]',
				},
			},
		],
	},
};
