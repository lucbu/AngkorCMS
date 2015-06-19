@extends('admin/admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Template</div>
				<div class="panel-body">
		  			<div class="btn-group pull-right">
						<p>
							{!! link_to_route('angkorcmstemplates.create', 'New template', null, array('class' => 'btn btn-primary btn-block')) !!}
						</p>
					</div>
					<table class="table">
						<tr><th>#</th><th>Name</th><th>Edit</th><th>Delete</th></tr>
						@foreach ($templates as $template)
							<tr>
								<td>{{ $template->id }}</td>
								<td>{{ $template->name }}</td>
								<td>{!! link_to_route('angkorcmstemplates.edit', 'Edit', array($template->id), array('class' => 'btn btn-warning btn-block')) !!}</td>
								<td>
									{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmstemplates.destroy', $template->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this template ?\')')) !!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@stop