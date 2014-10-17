<?php

class CarouselManagementController extends BaseController {

	public function __construct()
	{
		$this->beforeFilter(function () {
			if (!Auth::check()) {
				return Redirect::intended(action('AuthController@login'));
			}
		});
		$this->storageFolder = Config::get('project.carousel');
	}

	public function createCarouselItemGet()
	{
		$modelState = Session::get('modelState');
		return View::Make('dashboard.createCarouselItem', array('modelState' => $modelState));
	}

	public function createCarouselItemPost()
	{
		$errors = array();
		$title = trim(Input::get('imageTitle', ''));
		$linkTo = trim(Input::get('linkTo', ''));

		if(!Input::hasFile('image')){
			$errors[] = 'Image file is not chosen!';
			$modelState['errors'] = $errors;
			return View::Make('dashboard.createCarouselItem')->with('modelState', $modelState);
		}

		$imageFile = Input::file('image');
		$md5_hash = md5_file($imageFile);
		$extension = $imageFile->getClientOriginalExtension();
		$originalName = $imageFile->getClientOriginalName();
		$dbFileName = $md5_hash .'.'. $extension;
		$storageFileName = $this->storageFolder . $dbFileName;

		if (count(CarouselItem::where('imageUrl', $dbFileName)->get()) > 0) {
			$errors[] = 'This image already active in carousel. Disable it or delete, before adding new!';
			$modelState['errors'] = $errors;
			return Redirect::action('CarouselManagementController@createCarouselItemGet')->with('modelState', $modelState);
		}

		if(!Storage::exists($storageFileName)){
			Storage::upload($imageFile, $storageFileName);
		}

		$carouselItem = new CarouselItem;
		$carouselItem->imageUrl = $dbFileName;
		$carouselItem->imageTitle = $title;
		$carouselItem->linkTo = $linkTo;
		$carouselItem->originalName = $originalName;
		$carouselItem->save();

		$modelState['success'][] = 'New image successfully added to carousel!';
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}

	public function carouselItems(){

		$modelState = Session::get('modelState');

		$enabledCarouselItemsDb = CarouselItem::all();
		$model = array();

		foreach($enabledCarouselItemsDb as $item) {
			$model['enabledItems'][] = array(
				'imageUrl' => Storage::url($this->storageFolder . $item['imageUrl']),
				'originalName' => $item['originalName'],
				'imageTitle' => $item['imageTitle'],
				'linkTo' => $item['linkTo'],
				'id' => $item['id']
			);
		}

		$disabledCarouselItemsDb = CarouselItem::onlyTrashed()->get();

		foreach($disabledCarouselItemsDb as $item){
			$model['disabledItems'][] = array(
				'imageUrl' => Storage::url($this->storageFolder . $item['imageUrl']),
				'originalName' => $item['originalName'],
				'imageTitle' => $item['imageTitle'],
				'linkTo' => $item['linkTo'],
				'id' => $item['id']
			);
		}

		return View::Make('dashboard.carouselItems', array(
			'model' => $model,
			'modelState' => $modelState
		));
	}

	public function carouselItemDisable(){
		$item = CarouselItem::find(Input::get('id'));
		$deletedName = $item->originalName;
		$item->delete();
		$modelState['success'][] = 'Item ' . $deletedName . ' disabled successfully!';
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}

	public function carouselItemDelete(){
		$item = CarouselItem::withTrashed()->where('id', Input::get('id'))->firstOrFail();
		$deletedItemName = $item['originalName'];
		$fileInStoragePath = $this->storageFolder . $item['imageUrl'];
		$imageHash = $item['imageUrl'];
		$item->forceDelete();
		if($item = CarouselItem::withTrashed()->where('imageUrl', $imageHash)->count() == 0){
			Storage::delete($fileInStoragePath);
		}
		$modelState['success'][] = 'Item deleted '. $deletedItemName .' successfully!';
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}

	public function carouselItemEnable(){
		$item = CarouselItem::onlyTrashed()->where('id', Input::get('id'))->firstOrFail();
		$imageHash = $item['imageUrl'];
		if(CarouselItem::where('imageUrl', $imageHash)->count() > 0){
			$modelState['errors'][] = 'Item with same image is already enabled in carousel! Disable or delete active item, then try enable this again!';
		} else {
			$item->restore();
			$modelState['success'][] = 'Item enabled ' . $item->originalName . ' successfully!';
		}
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}
} 