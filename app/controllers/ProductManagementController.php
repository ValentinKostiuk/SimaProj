<?php

class ProductManagementController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter(function () {
			if (!Auth::check()) {
				return Redirect::intended(action('AuthController@login'));
			}
		});
		$this->storageFolder = Config::get('project.products');

		$this->productGroupEnum = array(
			0 => "all",
			1 => "men",
			2 => "women",
			3 => "kids"
		);
	}

	public function createProductItemGet()
	{
		$modelState = Session::get('modelState');
		$model['productGroups'] = $this->productGroupEnum;
		return View::Make('dashboard.createProductItem', array(
			'model' => $model,
			'modelState' => $modelState
		));
	}

	public function createProductItemPost()
	{
		$errors = array();
		$productTitle = trim(Input::get('productTitle', ''));
		$productName = trim(Input::get('productName', ''));
		$productGroup = Input::get('productGroup', 0);
		$productPrice = floatval(Input::get('productPrice', 0));
		$productDescription = Input::get('productDescription', '');
		$productShortDescription = Input::get('productShortDescription', '');

		if(!Input::hasFile('productImage')){
			$errors[] = 'Image file is not chosen!';
			$modelState['errors'] = $errors;
			return Redirect::action('ProductManagementController@createProductItemGet')->with('modelState', $modelState);
		}

		if($productName === ''){
			$errors[] = 'Please enter product name!';
			$modelState['errors'] = $errors;
			return Redirect::action('ProductManagementController@createProductItemGet')->with('modelState', $modelState);
		}

		$imageFile = Input::file('productImage');
		$md5_hash = md5_file($imageFile);
		$extension = $imageFile->getClientOriginalExtension();
		$dbFileName = $md5_hash .'.'. $extension;
		$storageFileName = $this->storageFolder . $dbFileName;

		if (count(CarouselItem::where('imageUrl', $dbFileName)->get()) > 0) {
			$errors[] = 'This image already active in gallery. Disable it or delete, before adding new!';
			$modelState['errors'] = $errors;
			return Redirect::action('ProductManagementController@createProductItemGet')->with('modelState', $modelState);
		}

		if(!Storage::exists($storageFileName)){
			Storage::upload($imageFile, $storageFileName);
		}

		$productItem = new ProductItem;
		$productItem->imageUrl = $dbFileName;
		$productItem->title = $productTitle;
		$productItem->name = $productName;
		$productItem->productGroup = $productGroup;
		$productItem->description = $productDescription;
		$productItem->shortDescription = $productShortDescription;
		$productItem->price = $productPrice;
		$productItem->save();

		$modelState['success'][] = 'New product successfully added to gallery!';

		return Redirect::action('ProductManagementController@productItems')->with('modelState', $modelState);
	}

	public function ProductItems(){

		$modelState = Session::get('modelState');

		$enabledProductItemsDb = ProductItem::all();
		$model = array();

		foreach($enabledProductItemsDb as $item) {
			$model['enabledItems'][] = array(
				'imageUrl' => Storage::url($this->storageFolder . $item['imageUrl']),
				'name' => $item['name'],
				'title' => $item['title'],
				'price' => floatval($item['price']),
				'description' => $item['description'],
				'shortDescription' => $item['shortDescription'],
				'productGroup' => $this->productGroupEnum[intval($item['productGroup'])],
				'id' => $item['id']
			);
		}

		$disabledProductItemsDb = ProductItem::onlyTrashed()->get();

		foreach($disabledProductItemsDb as $item){
			$model['disabledItems'][] = array(
				'imageUrl' => Storage::url($this->storageFolder . $item['imageUrl']),
				'name' => $item['name'],
				'title' => $item['title'],
				'price' => floatval($item['price']),
				'description' => $item['description'],
				'shortDescription' => $item['shortDescription'],
				'productGroup' => $this->productGroupEnum[intval($item['productGroup'])],
				'id' => $item['id']
			);
		}

		$model['productGroups'] = $this->productGroupEnum;
		return View::Make('dashboard.productItems', array(
			'model' => $model,
			'modelState' => $modelState
		));
	}

	public function productItemDisable(){
		$item = ProductItem::find(Input::get('id'));
		$deletedName = $item->originalName;
		$item->delete();
		$modelState['success'][] = 'Item ' . $deletedName . ' disabled successfully!';
		return Redirect::action('ProductManagementController@productItems')->with('modelState', $modelState);
	}
	public function productItemDelete(){
		$item = ProductItem::withTrashed()->where('id', Input::get('id'))->firstOrFail();
		$deletedItemName = $item['name'];
		$fileInStoragePath = $this->storageFolder . $item['imageUrl'];
		$imageHash = $item['imageUrl'];
		$item->forceDelete();
		if($item = ProductItem::withTrashed()->where('imageUrl', $imageHash)->count() == 0){
			Storage::delete($fileInStoragePath);
		}
		$modelState['success'][] = 'Item deleted '. $deletedItemName .' successfully!';
		return Redirect::action('ProductManagementController@productItems')->with('modelState', $modelState);
	}

	public function productItemEnable(){
		$item = ProductItem::onlyTrashed()->where('id', Input::get('id'))->firstOrFail();
		$imageHash = $item['imageUrl'];
		if(ProductItem::where('imageUrl', $imageHash)->count() > 0){
			$modelState['errors'][] = 'Item with same image is already enabled in carousel! Disable or delete active item, then try enable this again!';
		} else {
			$item->restore();
			$modelState['success'][] = 'Item enabled ' . $item->name . ' successfully!';
		}
		return Redirect::action('ProductManagementController@productItems')->with('modelState', $modelState);
	}
} 