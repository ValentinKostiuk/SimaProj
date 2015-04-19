@extends('layouts.dashboardLayout')
@section('content')
	<h2 class="dashboard-carousel-items-heading">All Articles <span><a class="add-new-item-link" href="{{{action('ArticleManagementController@createArticleItemGet')}}}">add new +</a></span></h2>
	@if(count($model['enabledItems'])>0)
		<h3 class="dashboard-carousel-items-heading">Enabled Articles</h3>
		<div class="dashboard-carousel-items-wrapper">
			@foreach ($model['enabledItems'] as $item)
				<div class="dashboard-carousel-item-container">
					<h3 class="dashboard-carousel-item-heading">{{$item['heading']}}</h3>
					<div class="dashboard-article-content">{{$item['content']}}</div>

					<div class="dashboard-article-item-forms-wrapper">
						<form action="{{{action('ArticleManagementController@articleItemDisable')}}}" method="POST">
							<div class="dashboard-carousel-item-forms-button-container">
								<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
								<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Disable">
							</div>
						</form>
						<form action="{{{action('ArticleManagementController@articleItemDelete')}}}" method="POST">
							<div class="dashboard-carousel-item-forms-button-container">
								<input type="text" name="id" id="id" style="display: none; visibility: hidden"
								       value="{{$item['id']}}">
								<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Delete">
							</div>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	@endif

	@if(count($model['disabledItems'])>0)
		<h3 class="dashboard-carousel-disabled-items-heading">Currently Disabled Article Items</h3>
		<div class="dashboard-carousel-items-wrapper">
			@foreach ($model['disabledItems'] as $item)
				<div class="dashboard-carousel-item-container">
					<h3 class="dashboard-carousel-item-heading">{{$item['heading']}}</h3>
					<div class="dashboard-article-content">{{$item['content']}}</div>

					<div class="dashboard-article-item-forms-wrapper">
						<form action="{{{action('ArticleManagementController@articleItemEnable')}}}" method="POST">
							<div class="dashboard-carousel-item-forms-button-container">
								<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
								<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Enable">
							</div>
						</form>
						<form action="{{{action('ArticleManagementController@articleItemDelete')}}}" method="POST">
							<div class="dashboard-carousel-item-forms-button-container">
								<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
								<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Delete">
							</div>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	@endif
@stop