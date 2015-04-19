<?php
class GalleryController extends BaseController
{

	public function __construct()
	{
		$this->storageFolder = Config::get('project.products');
	}
	public function showProductGroup($productGroupStr = 'all')
	{
		$group = ProductGroup::where('group', $productGroupStr)->first();
		if($group == null){
			$group = ProductGroup::where('group', 'all')->first();
		}
		$galleryItems = $group->products;
		$model['galleryItems'] = array();

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

	public function showProduct($productId = null)
	{
		if (!$productId) {
			return Redirect::action('GalleryController@showProductGroup');
		}

		$product = ProductItem::find($productId);

		if ($product === null) {
			App::abort(404);
		}

		$productModel = array(
			'imageUrl' => Storage::url($this->storageFolder . $product['imageUrl']),
			'name' => $product['name'],
			'title' => $product['title'],
			'price' => floatval($product['price']),
			'shortDescription' => $product['shortDescription'],
			'description' => $product['description'],
			'id' => $product['id']
		);

		return View::Make('main.galleryProductPage', array(
			'product' => $productModel
		));
	}
}