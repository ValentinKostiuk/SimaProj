<?php

/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 28.09.2014
 * Time: 22:09
 */
class LandingPageController extends BaseController
{
	public function showLandingPage()
	{
		return View::make('layouts.mainLayout');
	}
} 