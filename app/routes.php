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
Route::get('/dashboard/users', 'UserManagementController@users');
Route::get('/dashboard/users/create', 'UserManagementController@createUserGet');
Route::post('/dashboard/users/create', 'UserManagementController@createUserPost');
Route::post('/dashboard/users/delete', 'UserManagementController@deleteUser');
//carousel management
Route::get('/dashboard/carouselItems', 'CarouselManagementController@carouselItems');
Route::get('/dashboard/carouselItem/create', 'CarouselManagementController@createCarouselItemGet');
Route::post('/dashboard/carouselItem/create', 'CarouselManagementController@createCarouselItemPost');
Route::post('/dashboard/carouselItem/enable', 'CarouselManagementController@carouselItemEnable');
Route::post('/dashboard/carouselItem/disable', 'CarouselManagementController@carouselItemDisable');
Route::post('/dashboard/carouselItem/delete', 'CarouselManagementController@carouselItemDelete');
//products management
Route::get('/dashboard/productItems', 'ProductManagementController@productItems');
Route::get('/dashboard/productItem/create', 'ProductManagementController@createProductItemGet');
Route::post('/dashboard/productItem/create', 'ProductManagementController@createProductItemPost');
Route::post('/dashboard/productItem/disable', 'ProductManagementController@productItemDisable');
Route::post('/dashboard/productItem/disable', 'ProductManagementController@productItemDelete');