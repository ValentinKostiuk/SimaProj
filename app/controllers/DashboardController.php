<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 10.10.2014
 * Time: 23:07
 */

class DashboardController extends BaseController {
	public function __construct()
	{
		$this->beforeFilter(function()
		{
			if (!Auth::check())
			{
				return Redirect::intended (action('AuthController@login'));
			}
		});
	}

	public function showMainDashboard()
	{
		return View::Make('dashboard.main');
	}

	public function contactAdmin()
	{
		return View::Make();
	}
} 