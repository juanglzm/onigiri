import { Navigation } from '@10up/component-navigation';

document.addEventListener('DOMContentLoaded', () => {
	new Navigation('.primary-menu', {
		action: 'click',
		breakpoint: '(min-width:782px)',
	});
});
