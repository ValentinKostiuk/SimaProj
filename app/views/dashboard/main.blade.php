@extends('layouts.dashboardLayout')
@section('content')
	<ul class="dashboard-big-menu-list">
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('CarouselManagementController@carouselItems')}}}"><img
						src="/statics/images/main/dashboard-carousel.jpg" class="dashboard-big-menu-image"><span>Manage Carousel</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('ProductManagementController@productItems')}}}"><img
						src="/statics/images/main/dashboard-gallery.jpg" class="dashboard-big-menu-image"><span>Manage Gallery</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('ArticleManagementController@articleItems')}}}"><img
						src="/statics/images/main/dashboard-gallery.jpg" class="dashboard-big-menu-image"><span>Manage Articles</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('UserManagementController@users')}}}"><img src="/statics/images/main/dashboard-users.jpg"
			                                                              class="dashboard-big-menu-image"><span>Manage Users</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="#hohoAdminHelp"><img src="/statics/images/main/dashboard-admin.jpg"
			                              class="dashboard-big-menu-image"><span>Contact Admin</span></a>
		</li>
	</ul>
@stop