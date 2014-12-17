@extends('layouts.dashboardLayout')
@section('content')
@if(isset($model['enabledItems']))
<h3 class="dashboard-carousel-items-heading">All Gallery Items</h3>
<div class="dashboard-carousel-items-wrapper">
	@foreach ($model['enabledItems'] as $item)
	<div class="dashboard-carousel-item-container">
		<h3 class="dashboard-carousel-item-heading">{{$item['name']}}</h3>
		<div class="dashboard-carousel-item-image-wrapper">
			<img src="{{$item['imageUrl']}}" class="dashboard-carousel-item-image"/>
		</div>
		<div class="dashboard-carousel-item-fields product-items">
			<span class="dashboard-carousel-item-field-label">Product id: </span><span class="dashboard-carousel-item-field-value">{{$item['id']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Product group: </span><span class="dashboard-carousel-item-field-value">{{$item['productGroup']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Product price: </span><span class="dashboard-carousel-item-field-value">{{$item['price']}}</span><br />
			<span class="dashboard-carousel-item-field-label">On hover title: </span><span class="dashboard-carousel-item-field-value">{{$item['title']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Short description: </span><span class="dashboard-carousel-item-field-value">{{$item['shortDescription']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Product description: </span><span class="dashboard-product-item-field-value description-field">{{$item['description']}}</span>
		</div>
		<div class="dashboard-carousel-item-forms-wrapper">
			<form action="{{{action('ProductManagementController@productItemDisable')}}}" method="POST">
				<div class="dashboard-carousel-item-forms-button-container">
					<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
					<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Disable">
				</div>
			</form>
			<form action="{{{action('ProductManagementController@productItemDelete')}}}" method="POST">
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
<h3 class="dashboard-carousel-disabled-items-heading">Currently Disabled Product Items</h3>
<div class="dashboard-carousel-items-wrapper">
	@foreach ($model['disabledItems'] as $item)
	<div class="dashboard-carousel-item-container">
		<h3 class="dashboard-carousel-item-heading">{{$item['name']}}</h3>
		<div class="dashboard-carousel-item-image-wrapper">
			<img src="{{$item['imageUrl']}}" class="dashboard-carousel-item-image"/>
		</div>
		<div class="dashboard-carousel-item-fields product-items">
			<span class="dashboard-carousel-item-field-label">Product id: </span><span class="dashboard-carousel-item-field-value">{{$item['id']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Product group: </span><span class="dashboard-carousel-item-field-value">{{$item['productGroup']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Product price: </span><span class="dashboard-carousel-item-field-value">{{$item['price']}}</span><br />
			<span class="dashboard-carousel-item-field-label">On hover title: </span><span class="dashboard-carousel-item-field-value">{{$item['title']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Short description: </span><span class="dashboard-carousel-item-field-value">{{$item['shortDescription']}}</span><br />
			<span class="dashboard-carousel-item-field-label">Product description: </span><span class="dashboard-carousel-item-field-value description-field">{{$item['description']}}</span>
		</div>
		<div class="dashboard-carousel-item-forms-wrapper">
			<form action="{{{action('ProductManagementController@productItemEnable')}}}" method="POST">
				<div class="dashboard-carousel-item-forms-button-container">
					<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$item['id']}}">
					<input type="submit" class="dashboard-carousel-item-forms-submit-button" value="Enable">
				</div>
			</form>
			<form action="{{{action('ProductManagementController@productItemDelete')}}}" method="POST">
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