@extends('layouts.dashboardLayout')
@section('content')
<h3 class="dashboard-form-heading">All Users</h3>
@foreach ($model['users'] as $user)
<div class="dashboard-form-wrapper">
	<h3 class="dashboard-form-heading">{{$user->username}}</h3>
	<form action="{{{action('UserManagementController@deleteUser')}}}" method="POST">
		<div class="dashboard-inputs-container">
			<span class="dashboard-field-label">E-mail: </span><span class="dashboard-field-value">{{$user->email}}</span><br />
			<span class="dashboard-field-label">Role: </span>
			<span class="dashboard-field-value">
			@if ($user->role == 1)
				Super Admin
			@elseif ($user->role == 2)
				Admin
			@else
				Average user
			@endif
			</span>
			<input type="text" name="id" id="id" style="display: none; visibility: hidden" value="{{$user->id}}">
		</div>
		<div class="dashboard-form-footer">
			<input type="submit" class="dashboard-form-submit-button" value="Delete">
		</div>
	</form>
</div>
@endforeach
@stop