@extends('layouts.dashboardLayout')
@section('content')
@if(isset($model['enabledItems']))
<h3 class="dashboard-carousel-items-heading">All Carousel Items</h3>
<div class="dashboard-carousel-items-wrapper">
	@foreach ($model['enabledItems'] as $item)
	<div class="dashboard-carousel-item-container">
		<h3 class="dashboard-carousel-item-heading">{{$item['originalName']}}</h3>
		<div class="dashboard-carousel-item-image-wrapper">
			<img src="{{$item['imageUrl']}}" class="dashboard-carousel-item-image"/>
		</div>
		<div class="dashboard-carousel-item-fields">
			<span class="dashboard-carousel-item-field-label">On hover title: </span><span class="dashboard-carousel-item-field-value">{{$item['imageTitle']}}</span><br />
			<span class="dashboard-carousel-item-field-label">On click redirect action link: </span><span class="dashboard-carousel-item-field-value">{{$item['linkTo']}}</span>
		</div>
		<div class="dashboard-carousel-item-forms-wrapper">
			<form action="{{{action('DashboardController@carouselItemDisable')}}}" method="POST">
				<div class="dashboard-carousel-item-forms-button-container">
					<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
					<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Disable">
				</div>
			</form>
			<form action="{{{action('DashboardController@carouselItemDelete')}}}" method="POST">
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

@if(isset($model['disabledItems']))
<h3 class="dashboard-carousel-disabled-items-heading">Currently Disabled Carousel Items</h3>
<div class="dashboard-carousel-items-wrapper">
	@foreach ($model['disabledItems'] as $item)
	<div class="dashboard-carousel-item-container">
		<h3 class="dashboard-carousel-item-heading">{{$item['originalName']}}</h3>
		<div class="dashboard-carousel-item-image-wrapper">
			<img src="{{$item['imageUrl']}}" class="dashboard-carousel-item-image"/>
		</div>
		<div class="dashboard-carousel-item-fields">
			<span class="dashboard-carousel-item-field-label">On hover title: </span><span class="dashboard-carousel-item-field-value">{{$item['imageTitle']}}</span><br />
			<span class="dashboard-carousel-item-field-label">On click redirect action link: </span><span class="dashboard-carousel-item-field-value">{{$item['linkTo']}}</span>
		</div>
		<div class="dashboard-carousel-item-forms-wrapper">
			<form action="{{{action('DashboardController@carouselItemEnable')}}}" method="POST">
				<div class="dashboard-carousel-item-forms-button-container">
					<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
					<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Enable">
				</div>
			</form>
			<form action="{{{action('DashboardController@carouselItemDelete')}}}" method="POST">
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