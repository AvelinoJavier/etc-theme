jQuery(function ($) {
	const $navbar = $('.navbar');
	const initialNavbarHtml = $('.navbar').html();

	let navbarChanged = false;

	function centerBrandLogo() {
		let $navbarMenuItems = $('.navbar-nav .menu-item');
		let $navbarMenuItemsLenght = $navbarMenuItems.length;

		if ($navbarMenuItemsLenght % 2 === 0 && window.matchMedia('(min-width: 992px)').matches) {
			let middleIndex = Math.floor($navbarMenuItemsLenght / 2);
			$navbarMenuItems.eq(middleIndex - 1).after($('.navbar-brand'));

			navbarChanged = true;
		}
		else if (navbarChanged) {
			$navbar.html(initialNavbarHtml);

			navbarChanged = false;
		}
	}
	centerBrandLogo();

	$(window).resize(centerBrandLogo);
});
