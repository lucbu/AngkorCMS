@extends('admin/admin')

@section('content')
	<div class="col-sm-offset-4 col-sm-4">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">User's profile</div>
		<div class="panel-body">
			<p>Name : {{ $user->name }}</p>
			@if(Auth::user()->admin)
			<p>Email : {{ $user->email }}</p>
				@if($user->admin == 1)
					Admin
				@endif
			@endif
		</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-primary">
		<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	</a>
</div>
@stop