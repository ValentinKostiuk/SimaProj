<?php

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 28.09.2014
 * Time: 22:09
 */
class MainSiteController extends BaseController
{
	public function showLandingPage()
	{
		return View::make('main.landingPage');
	}
} 