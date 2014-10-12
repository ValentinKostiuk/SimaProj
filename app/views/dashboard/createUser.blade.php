@extends('layouts.dashboardLayout')
@section('content')
<div class="dashboard-form-wrapper">
	<h3 class="dashboard-form-heading">Create New User</h3>
	<form action="{{{action('DashboardController@createUserPost')}}}" method="POST">
		<div class="dashboard-inputs-container">
			<label for="username" class="dashboard-input-label">Enter name of new user:</label>
			<input type="text" name="username" id="username" class="dashboard-create-user-name dashboard-input">
			<br/>
			<label for="email" class="dashboard-input-label">Enter E-mail:</label>
			<input type="email" name="email" id="email" class="dashboard-create-user-email dashboard-input">
			<br/>
			<label for="password" class="dashboard-input-label">Enter password:</label>
			<input type="password" name="password" id="password" class="dashboard-create-user-password dashboard-input">
			<br/>
			<label for="password-confirm" class="dashboard-input-label">Confirm password:</label>
			<input type="password" name="password-confirm" id="password-confirm" class="dashboard-create-user-confirm-password dashboard-input">
			<br/>
		</div>
		<div class="dashboard-form-footer">
			<input type="submit" class="dashboard-form-submit-button" value="Create">
		</div>
	</form>
</div>
@stop