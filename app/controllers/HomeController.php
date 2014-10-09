<?php

class HomeController extends BaseController
{

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return asset('assets/images/jasmine.png');
		//return View::make('hello');
	}

	public function showHash()
	{
//		$user = User::find(1);
//		Auth::login ($user );

		if(Auth::attempt (array ('username' => 'ValentinKostiuk' , 'password' => 'SO239290so')))
		{
			return Auth::id();
		}

		return 'trololo';

		//return User::find(1);
	}

}
