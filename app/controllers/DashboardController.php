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
}