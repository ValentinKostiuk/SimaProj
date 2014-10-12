/**
 * Created by Администратор on 30.09.2014.
 */
(function(){
	'use strict';

	var layoutSelectors = {
		subMenuContainer: '.header-main-site-sub-nav',
		allMenuItems: '.main-menu-item',

		userSubMenuContainer: '.header-container-user-sub-nav',
		allUserMenuItems: '.user-menu-item'
	};

	function initMainDashboardMenu(){
		var allItems = $(layoutSelectors.allMenuItems);

		allItems.each(function(index, item){
			var currentItem = $(item),
				link = currentItem.children('a');
			if(currentItem.children(layoutSelectors.subMenuContainer).length > 0){
				link.text(link.text() + ' +');
			}
			if(link[0].href === window.location.href){
				currentItem.addClass('active');
			}
		});
	}

	function initUserDashboardMenu(){
		var allItems = $(layoutSelectors.allUserMenuItems);

		allItems.each(function(index, item){
			var currentItem = $(item),
				link = currentItem.children('a, span');
			if(currentItem.children(layoutSelectors.userSubMenuContainer).length > 0){
				link.text(link.text() + ' +');
			}
			if(link[0].href === window.location.href){
				currentItem.addClass('active');
			}
		});
	}

	$(document).ready(function() {
		initMainDashboardMenu();
		initUserDashboardMenu();
	});
}());

