/**
 * Created by Valentin Kostiuk on 15.03.2015.
 */
/**
 * Created by Администратор on 30.09.2014.
 */
(function(){
	'use strict';

	var layoutSelectors = {
		allMenuItems: '.gallery-left-menu-item'
	};

	function initGalleryMenu(){
		var allItems = $(layoutSelectors.allMenuItems);

		allItems.each(function(index, item){
			var currentItem = $(item),
				link = currentItem.children('a');
			if(link[0].href === window.location.href){
				currentItem.addClass('active');
			}
		});
	}

	$(document).ready(function() {
		initGalleryMenu();
	});
}());
