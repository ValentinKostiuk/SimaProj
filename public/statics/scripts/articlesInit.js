/**
 * Created by Valentin Kostiuk on 03.05.2015.
 */
(function(){
	function initCollapsibleArticles(){
		$('.articles-all-article-heading').on('click', function(){
			$(this).closest('.articles-all-article').toggleClass('collapsed');
		})
	}

	$(document).ready(function() {
		initCollapsibleArticles();
	});
}());