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
	}

	public function createProductItemGet()
	{
		$modelState = Session::get('modelState');
		$model['productGroups'] = array(
			0 => "all",
			1 => "men",
			2 => "women",
			3 => "kids"
		);
		return View::Make('dashboard.createProductItem', array(
			'model' => $model,
			'modelState' => $modelState
		));
	}

	public function createProductItemPost()
	{
		$modelState = Session::get('modelState');
		return var_dump($_POST);
	}

} 