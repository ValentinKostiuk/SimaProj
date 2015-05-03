@extends('layouts.dashboardLayout')
@section('content')
	<ul class="dashboard-big-menu-list">
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('CarouselManagementController@carouselItems')}}}"><i class="dashboard-big-menu-image icon-picture"></i><span>Manage Carousel</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('ProductManagementController@productItems')}}}"><i class="dashboard-big-menu-image icon-box"></i><span>Manage Products</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('ArticleManagementController@articleItems')}}}"><i class="dashboard-big-menu-image icon-doc-text"></i><span>Manage Articles</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="{{{action('UserManagementController@users')}}}"><i class="dashboard-big-menu-image icon-users"></i><span>Manage Users</span></a>
		</li>
		<li class="dashboard-big-menu-list-item">
			<a href="#hohoAdminHelp"><i class="dashboard-big-menu-image icon-cog"></i><span>Contact Admin</span></a>
		</li>
	</ul>
@stop