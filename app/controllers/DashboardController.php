<?php

class DashboardController extends BaseController
{
	public function __construct()
	{
		$this->beforeFilter(function () {
			if (!Auth::check()) {
				return Redirect::intended(action('AuthController@login'));
			}
		});
	}

	public function showMainDashboard()
	{
		return View::Make('dashboard.main');
	}

	public function contactAdmin()
	{
		var_dump(Storage::exists('user/avatar.jpg'));
		return View::Make('dashboard.main');
	}

	public function users()
	{
		$model['users'] = User::all();
		return View::Make('dashboard.users')->with('model', $model);
	}

	public function deleteUser()
	{
		$user = User::find(Input::get('id'));
		if ($user->role == 1) {
			$model['users'] = User::all();
			$modelState['errors'][] = 'User \'' . $user->username . '\' is Super admin. Super admin can not be deleted!';
			return View::make('dashboard.users', array(
					'model' => $model,
					'modelState' => $modelState)
			);
		} else {
			$deletedName = $user->username;
			$user->delete();
			$model['users'] = User::all();
			$modelState['success'][] = 'User ' . $deletedName . ' deleted successfully!';
			return View::make('dashboard.users', array(
					'model' => $model,
					'modelState' => $modelState)
			);
		}
	}

	public function createUserGet()
	{//TODO: remake this action like carousel item actions(with redirect and flush)
		return View::Make('dashboard.createUser');
	}

	public function createUserPost()
	{
		$errors = array();
		$input = Input::all();
		if ($input['password'] !== $input['password-confirm']) {
			$errors[] = 'Password confirmation and password does not match';
		}
		if ($input['password'] === '') {
			$errors[] = 'Enter password! It can not be empty';
		}
		if ($input['email'] === '') {
			$errors[] = 'Enter E-mail! It can not be empty';
		}
		if ($input['username'] === '') {
			$errors[] = 'Enter name! It can not be empty';
		}
		if (count(User::where('username', $input['username'])->get()) > 0) {
			$errors[] = 'User with this name already exists';
		}
		if (Auth::user()->role > 1) {
			$errors[] = 'You Don\'t have enough permissions to do this';
		}
		if (count($errors) > 0) {
			$modelState['errors'] = $errors;
			return View::Make('dashboard.createUser')->with('modelState', $modelState);
		} else {
			$user = new User;
			$user->username = $input['username'];
			$user->password = Hash::make($input['password']);
			$user->email = $input['email'];
			$user->role = 2;
			$user->save();

			$model['users'] = User::all();
			$modelState['success'][] = 'User ' . $user->username . ' created successfully!';
			return View::make('dashboard.users', array(
					'model' => $model,
					'modelState' => $modelState)
			);
		}
	}

	public function createCarouselItemGet()
	{
		$modelState = Session::get('modelState');
		return View::Make('dashboard.createCarouselItem', array('modelState' => $modelState));
	}

	public function createCarouselItemPost()
	{
		$storageFolder = Config::get('project.carousel');

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
		$storageFileName = $storageFolder . $dbFileName;

		if (count(CarouselItem::where('imageUrl', $dbFileName)->get()) > 0) {
			$errors[] = 'This image already active in carousel. Disable it or delete, before adding new!';
			$modelState['errors'] = $errors;
			return Redirect::action('DashboardController@createCarouselItemGet')->with('modelState', $modelState);
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
		return Redirect::action('DashboardController@carouselItems')->with('modelState', $modelState);
	}

	public function carouselItems(){
		$storageFolder = Config::get('project.carousel');

		$modelState = Session::get('modelState');

		$enabledCarouselItemsDb = CarouselItem::all();
		$model = array();

		foreach($enabledCarouselItemsDb as $item) {
			$model['enabledItems'][] = array(
				'imageUrl' => Storage::url($storageFolder . $item['imageUrl']),
				'originalName' => $item['originalName'],
				'imageTitle' => $item['imageTitle'],
				'linkTo' => $item['linkTo'],
				'id' => $item['id']
			);
		}

		$disabledCarouselItemsDb = CarouselItem::onlyTrashed()->get();

		foreach($disabledCarouselItemsDb as $item){
			$model['disabledItems'][] = array(
				'imageUrl' => Storage::url($storageFolder . $item['imageUrl']),
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
		return Redirect::action('DashboardController@carouselItems')->with('modelState', $modelState);
	}

	public function carouselItemDelete(){
		$storageFolder = Config::get('project.carousel');
		$item = CarouselItem::withTrashed()->where('id', Input::get('id'))->firstOrFail();
		$deletedItemName = $item['originalName'];
		$fileInStoragePath = $storageFolder . $item['imageUrl'];
		$item->forceDelete();
		//TODO check if nowhere more used
		Storage::delete($fileInStoragePath);
		$modelState['success'][] = 'Item deleted '. $deletedItemName .' successfully!';
		return Redirect::action('DashboardController@carouselItems')->with('modelState', $modelState);
	}

	public function carouselItemEnable(){
		$item = CarouselItem::onlyTrashed()->where('id', Input::get('id'))->firstOrFail();
		$item -> restore();
		$modelState['success'][] = 'Item enabled '. $item->originalName .' successfully!';
		return Redirect::action('DashboardController@carouselItems')->with('modelState', $modelState);
	}
}