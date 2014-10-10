<?php

Route::any('/', 'MainSiteController@showLandingPage');


//Authorization routs
Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/login', 'AuthController@tryLogin');
Route::get('/auth/logout', 'AuthController@logout');
//Dashboard routs
Route::get('/dashboard', 'DashboardController@showMainDashboard');
Route::get('/dashboard/contactAdmin', 'DashboardController@contactAdmin');
