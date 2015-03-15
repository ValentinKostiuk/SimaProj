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
				link = currentItem.children('a');
			if(currentItem.children(layoutSelectors.subMenuContainer).length > 0){
				link.text(link.text() + ' +');
			}
			if(~link[0].href.indexOf('gallery') && ~window.location.href.indexOf('gallery')){
				currentItem.addClass('active');
				return;
			}
			if(link[0].href === window.location.href){
				currentItem.addClass('active');
			}
		});
	}

	$(document).ready(function() {
		initMainSiteMenu();
	});
}());
