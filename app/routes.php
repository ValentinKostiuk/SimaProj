<?php

Route::any('/', 'MainSiteController@showLandingPage');
Route::any('/contacts', 'MainSiteController@showContactsPage');

Route::get('/gallery/product/{productId?}', 'GalleryController@showProduct');
Route::get('/gallery/{productGroup?}', 'GalleryController@showProductGroup');

Route::get('/articles', 'ArticleController@showAll');
Route::get('/articles/{articleId?}', 'ArticleController@show');

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
Route::post('/dashboard/productItem/delete', 'ProductManagementController@productItemDelete');
Route::post('/dashboard/productItem/enable', 'ProductManagementController@productItemEnable');
//article management
Route::get('/dashboard/articleItems', 'ArticleManagementController@articleItems');
Route::get('/dashboard/articleItem/create', 'ArticleManagementController@createArticleItemGet');
Route::post('/dashboard/articleItem/create', 'ArticleManagementController@createArticleItemPost');
Route::post('/dashboard/productItem/disable', 'ArticleManagementController@articleItemDisable');
Route::post('/dashboard/productItem/delete', 'ArticleManagementController@articleItemDelete');
Route::post('/dashboard/productItem/enable', 'ArticleManagementController@articleItemEnable');