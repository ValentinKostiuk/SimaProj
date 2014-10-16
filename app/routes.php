<?php

Route::any('/', 'MainSiteController@showLandingPage');


//Authorization routs
Route::get('/auth/login', 'AuthController@login');
Route::post('/auth/login', 'AuthController@tryLogin');
Route::get('/auth/logout', 'AuthController@logout');

//Dashboard routs
Route::get('/dashboard', 'DashboardController@showMainDashboard');
Route::get('/dashboard/contactAdmin', 'DashboardController@contactAdmin');
//user management
Route::get('/dashboard/users', 'DashboardController@users');
Route::get('/dashboard/users/create', 'DashboardController@createUserGet');
Route::post('/dashboard/users/create', 'DashboardController@createUserPost');
Route::post('/dashboard/users/delete', 'DashboardController@deleteUser');
//carousel management
Route::get('/dashboard/carouselItems', 'DashboardController@carouselItems');
Route::get('/dashboard/carouselItem/create', 'DashboardController@createCarouselItemGet');
Route::post('/dashboard/carouselItem/create', 'DashboardController@createCarouselItemPost');
Route::post('/dashboard/carouselItem/enable', 'DashboardController@carouselItemEnable');
Route::post('/dashboard/carouselItem/disable', 'DashboardController@carouselItemDisable');
Route::post('/dashboard/carouselItem/delete', 'DashboardController@carouselItemDelete');