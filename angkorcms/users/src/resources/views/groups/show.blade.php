@extends('admin/admin')

@section('content')
	<div class="col-sm-offset-4 col-sm-4">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">group</div>
		<div class="panel-body">
			<p>Name : {{ $group->name }}</p>
			<p>List of users :</p>
			<ul>
				@foreach($group->users as $user)
					<li>{{ $user->name }}</li>
				@endforeach
			</ul>
		</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-primary">
		<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	</a>
</div>
@stop
