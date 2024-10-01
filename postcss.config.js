module.exports = {
	plugins: [
		require( 'postcss-import' ),
		require( 'postcss-nested' ),
		require( 'postcss-preset-env' )( {
			autoprefixer: true,
			stage: 2,
			features: {
				'nesting-rules': true,
				'custom-media-queries': true,
				'custom-selectors': true,
			},
		} ),
		require( 'autoprefixer' ),
		require( 'cssnano' )( {
			preset: 'default',
		} ),
	],
};
