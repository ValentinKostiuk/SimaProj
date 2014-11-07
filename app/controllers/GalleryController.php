<?php
class GalleryController extends BaseController
{

	public function __construct()
	{
		$this->storageFolder = Config::get('project.products');

		$this->productGroupEnum = array(
			0 => "all",
			1 => "men",
			2 => "women",
			3 => "kids"
		);
	}
	public function showProductGroup($productGroupStr = 'all')
	{
		switch ($productGroupStr) {
			case 'all':
				$productGroup = 0;
				break;
			case 'men':
				$productGroup = 1;
				break;
			case 'women':
				$productGroup = 2;
				break;
			case 'kids':
				$productGroup = 3;
				break;
			default:
				$productGroup = 0;
		}
		$galleryItems = null;
		$model['galleryItems'] = array();

		if($productGroup === 0){
			$galleryItems = ProductItem::all();
		} else {
			$galleryItems = ProductItem::where('productGroup', $productGroup)->get();
		}

		foreach($galleryItems as $item) {
			$model['galleryItems'][] = array(
				'imageUrl' => Storage::url($this->storageFolder . $item['imageUrl']),
				'name' => $item['name'],
				'title' => $item['title'],
				'price' => floatval($item['price']),
				'description' => $item['description'],
				'id' => $item['id']
			);
		}
		return View::Make('main.galleryPage', array(
			'model' => $model
		));
	}
}