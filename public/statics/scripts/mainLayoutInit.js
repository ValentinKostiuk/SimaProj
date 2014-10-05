/**
 * Created by Администратор on 30.09.2014.
 */
(function(){
	'use strict';

	var layoutSelectors = {
		navigationParent: '.header-main-site-nav',
		mainMenuList: '.header-main-site-nav-menu',
		mainMenuItem: '.header-main-site-nav-menu-item',
		mainMenuItemLink: '.header-main-site-nav-menu-item a',

		subMenuContainer: '.header-main-site-sub-nav',
		subMenuList: '.header-main-site-sub-nav-menu',
		subMenuItem: '.header-main-site-sub-nav-menu-item',
		subMenuItemLink: '.header-main-site-sub-nav-menu-item a',

		allMenuItems: '.main-menu-item'
	};

	function initMainSiteMenu(){
		var allItems = $(layoutSelectors.allMenuItems);

		allItems.each(function(index, item){
			var currentItem = $(item),
				link;
			if(currentItem.children(layoutSelectors.subMenuContainer).length > 0){
				link = currentItem.children('a');
				link.text(link.text() + ' +')
			}
		});
	}

	$(document).ready(function() {
		$("#owl-example").owlCarousel({autoPlay: true, singleItem: true, pagination: false});
		initMainSiteMenu();
	});
}());
