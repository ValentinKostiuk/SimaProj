<?php

Route::any('/', 'MainSiteController@showLandingPage');


//Authorization routs
Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/login', 'AuthController@tryLogin');
Route::get('/auth/logout', 'AuthController@logout');

//Dashboard routs
Route::get('/dashboard', 'DashboardController@showMainDashboard');
Route::get('/dashboard/contactAdmin', 'DashboardController@contactAdmin');

Route::get('/dashboard/users', 'DashboardController@users');
Route::get('/dashboard/users/create', 'DashboardController@createUserGet');
Route::post('/dashboard/users/create', 'DashboardController@createUserPost');
Route::post('/dashboard/users/delete', 'DashboardController@deleteUser');
