<?php

class TestController extends BaseController
{
	public function showProductGroup($productGroupStr = 'all')
	{
		$group = ProductGroup::where('group', $productGroupStr)->first();
		$galleryItems = null;
var_dump($productGroupStr);
		var_dump($group->products);
//		foreach($galleryItems as $item) {
//			$model['galleryItems'][] = array(
//				'imageUrl' => Storage::url($this->storageFolder . $item['imageUrl']),
//				'name' => $item['name'],
//				'title' => $item['title'],
//				'price' => floatval($item['price']),
//				'description' => $item['description'],
//				'id' => $item['id']
//			);
//		}
		return $group;
	}
}