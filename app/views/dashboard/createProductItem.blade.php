@extends('layouts.dashboardLayout')
@section('content')
	<script type="text/javascript" src="/statics/thirdPartyLibs/ckeditor/ckeditor.js"></script>
	<div class="dashboard-form-wrapper">
		<h3 class="dashboard-form-heading">Create New Product</h3>

		<form action="{{{action('ProductManagementController@createProductItemPost')}}}" method="POST"
		      enctype="multipart/form-data">
			<div class="dashboard-inputs-container">
				<label for="productImage" class="dashboard-input-label">Choose image file:</label>
				<input type="file" name="productImage" id="productImage" class="dashboard-input">
				<br/>
				<label for="productName" class="dashboard-input-label">Enter product name:</label>
				<input type="text" name="productName" id="productName" class="dashboard-input">
				<br/>
				<label for="productTitle" class="dashboard-input-label">Enter image title (optional):</label>
				<input type="text" name="productTitle" id="productTitle" class="dashboard-input">
				<br/>
				<label for="productShortDescription" class="dashboard-input-label">Enter short description of
					product:</label>
				<input type="text" name="productShortDescription" id="productShortDescription" maxlength="250"
				       class="dashboard-input">
				<br/>
				<label for="productPrice" class="dashboard-input-label">Enter product price:</label>
				<input type="text" name="productPrice" id="productPrice" class="dashboard-input">
				<br/>
				<label for="productGroup" class="dashboard-input-label">Select product group:</label>
				<select name="productGroup" id="productGroup" class="dashboard-select">
					@foreach ($model['productGroups'] as $key => $value)
						<option value="{{$key}}">{{$value}}</option>
					@endforeach
				</select>
				<br/>
				<label for="productDescription" class="dashboard-input-label">Enter full product description
					(optional):</label>
				<textarea name="productDescription" id="productDescription" class="dashboard-textaria"></textarea>
				<br/>
			</div>
			<div class="dashboard-form-footer">
				<input type="submit" class="dashboard-form-submit-button" value="Add Product">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace( 'productDescription' );
	</script>
@stop