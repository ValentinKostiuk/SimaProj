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
	{
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
}