<?php
class MainSiteController extends BaseController
{
	public function showLandingPage()
	{
		$storageFolder = Config::get('project.carousel');
		$carouselItemsDb = CarouselItem::all();
		$model = array();

		foreach($carouselItemsDb as $item) {
			$model['carouselItems'][] = array(
				'imageUrl' => Storage::url($storageFolder . $item['imageUrl']),
				'originalName' => $item['originalName'],
				'imageTitle' => $item['imageTitle'],
				'linkTo' => $item['linkTo']
			);
		}

		$articlesDb = ArticleItem::take(3)->get();

		foreach($articlesDb as $article) {
			$model['articles'][] = array(
				'id' => $article['id'],
				'heading' => $article['heading'],
				'content' => strip_tags($article['content'])
			);
		}

		return View::make('main.landingPage', array(
		'model' => $model
		));
	}

	public function showContactsPage()
	{
		return View::make('main.contactsPage');
	}
} 