@extends('layouts.dashboardLayout')
@section('content')
<div class="dashboard-form-wrapper">
	<h3 class="dashboard-form-heading">Create New User</h3>
	<form action="{{{action('DashboardController@createCarouselItemPost')}}}" method="POST" enctype="multipart/form-data">
		<div class="dashboard-inputs-container">
			<label for="imageTitle" class="dashboard-input-label">Enter image title:</label>
			<input type="text" name="imageTitle" id="imageTitle" class="dashboard-input">
			<br/>
			<label for="linkTo" class="dashboard-input-label">Enter transfer link:</label>
			<input type="text" name="linkTo" id="linkTo" class="dashboard-input">
			<br/>
			<label for="image" class="dashboard-input-label">Choose image file:</label>
			<input type="file" name="image" id="image" class="dashboard-input">
			<br/>
		</div>
		<div class="dashboard-form-footer">
			<input type="submit" class="dashboard-form-submit-button" value="Add To Carousel">
		</div>
	</form>
</div>
@stop