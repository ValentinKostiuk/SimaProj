<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 09.10.2014
 * Time: 21:41
 */
class AuthController extends BaseController
{
	public function login()
	{
		return View::make('login');
	}
	public function tryLogin()
	{
		$email=$_POST['email'];
		$password=$_POST['password'];

		if(Auth::attempt (array('email' => $email , 'password' => $password), true))
		{
			return 'Authorized';
		}
		return Redirect::intended (action('AuthController@login'));
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::intended (action('AuthController@login'));
	}
}
