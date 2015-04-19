@extends('layouts.dashboardLayout')
@section('content')
	<script type="text/javascript" src="/statics/thirdPartyLibs/ckeditor/ckeditor.js"></script>
	<div class="dashboard-form-wrapper">
		<h3 class="dashboard-form-heading">Create New Article</h3>

		<form action="{{{action('ArticleManagementController@createArticleItemPost')}}}" method="POST" enctype="multipart/form-data">
			<div class="dashboard-inputs-container">
				<label for="heading" class="dashboard-input-label">Enter Article heading:</label>
				<input type="text" name="heading" id="heading" class="dashboard-input">
				<br/>
				<label for="content" class="dashboard-input-label">Define content:</label>
				<textarea name="content" id="content" class="dashboard-textaria"></textarea>
				<br/>
			</div>
			<div class="dashboard-form-footer">
				<input type="submit" class="dashboard-form-submit-button" value="Add Article">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		CKEDITOR.replace('content');
	</script>
@stop