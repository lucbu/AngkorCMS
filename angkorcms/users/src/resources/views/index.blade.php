@extends('admin/admin')

@section('content')
<br>
<div class="col-sm-offset-4 col-sm-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Users' list</h3>
		</div>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<td>{{ $user->id }}</td>
				<td class="text-primary"><strong><a href="{{ route('angkorcmsusers.show', array($user->id)) }}">{{ $user->name }}</a></strong></td>
				<td>{!! link_to_route('angkorcmsusers.show', 'Show', array($user->id), array('class' => 'btn btn-success btn-block')) !!}</td>
				<td>{!! link_to_route('angkorcmsusers.edit', 'Edit', array($user->id), array('class' => 'btn btn-warning btn-block')) !!}</td>
				<td>
					{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmsusers.destroy', $user->id))) !!}
					{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this user ?\')')) !!}
					{!! Form::close() !!}
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
{!! link_to_route('angkorcmsusers.create', 'Add an user', null, array('class' => 'btn btn-info pull-right')) !!}
{!! $users->render() !!}
</div>
@stop
