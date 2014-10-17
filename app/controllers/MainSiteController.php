<?php

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 28.09.2014
 * Time: 22:09
 */
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

		return View::make('main.landingPage', array(
		'model' => $model
		));
	}
} 