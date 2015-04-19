<?php

class ArticleManagementController extends BaseController
{

	public function __construct()
	{
		$this->beforeFilter(function () {
			if (!Auth::check()) {
				return Redirect::intended(action('AuthController@login'));
			}
		});
	}

	public function createArticleItemGet()
	{
		$modelState = Session::get('modelState');
		return View::Make('dashboard.createArticleItem', array('modelState' => $modelState));
	}

	public function createArticleItemPost()
	{
		$errors = array();
		$heading = trim(Input::get('heading', ''));
		$content = trim(Input::get('content', ''));
		if ($heading == '') {
			$errors[] = 'Heading of article can\'t be empty!';
		}
		if ($content == '') {
			$errors[] = 'Content of article can\'t be empty!';
		}
		if (count($errors) > 0) {
			$modelState['errors'] = $errors;
			return Redirect::action('ArticleManagementController@createArticleItemGet')->with('modelState', $modelState);
		}
		$carouselItem = new ArticleItem;
		$carouselItem->heading = $heading;
		$carouselItem->content = $content;
		$carouselItem->save();
		$modelState['success'][] = 'New article successfully added!';
		return Redirect::action('ArticleManagementController@articleItems')->with('modelState', $modelState);
	}

	public function articleItems()
	{

		$modelState = Session::get('modelState');
		$model = array();
		$model['enabledItems'] = ArticleItem::all();

		$model['disabledItems'] = ArticleItem::onlyTrashed()->get();

		return View::Make('dashboard.articleItems', array(
			'model' => $model,
			'modelState' => $modelState
		));
	}

	public function articleItemDisable()
	{
		$item = ArticleItem::find(Input::get('id'));
		$deletedName = $item->originalName;
		$item->delete();
		$modelState['success'][] = 'Item ' . $deletedName . ' disabled successfully!';
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}

	public function articleItemDelete()
	{
		$item = ArticleItem::withTrashed()->where('id', Input::get('id'))->firstOrFail();
		$deletedItemName = $item['originalName'];
		$fileInStoragePath = $this->storageFolder . $item['imageUrl'];
		$imageHash = $item['imageUrl'];
		$item->forceDelete();
		if ($item = ArticleItem::withTrashed()->where('imageUrl', $imageHash)->count() == 0) {
			Storage::delete($fileInStoragePath);
		}
		$modelState['success'][] = 'Item deleted ' . $deletedItemName . ' successfully!';
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}

	public function articleItemEnable()
	{
		$item = ArticleItem::onlyTrashed()->where('id', Input::get('id'))->firstOrFail();
		$imageHash = $item['imageUrl'];
		if (ArticleItem::where('imageUrl', $imageHash)->count() > 0) {
			$modelState['errors'][] = 'Item with same image is already enabled in carousel! Disable or delete active item, then try enable this again!';
		} else {
			$item->restore();
			$modelState['success'][] = 'Item enabled ' . $item->originalName . ' successfully!';
		}
		return Redirect::action('CarouselManagementController@carouselItems')->with('modelState', $modelState);
	}
} 