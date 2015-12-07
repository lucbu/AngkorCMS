@extends('admin/admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Pages</div>
				<div class="panel-body">
		  			<div class="btn-group pull-right">
						<p>
							{!! link_to_route('angkorcmspages.create', 'New page', null, array('class' => 'btn btn-primary btn-block')) !!}
						</p>
					</div>
					<table class="table">
						<tr><th>#</th><th>Name</th><th>Template/Theme</th><th>Accessible</th><th>Edit</th><th>Delete</th></tr>
						@foreach ($pages as $page)
							<tr>
								<td>{{ $page->id }}</td>
								<td>{{ $page->name }}</td>
								<td>{{ $page->theme->template->name }}/{{ $page->theme->name }}</td>
								<td>{{ $page->accessible }}</td>
								<td>{!! link_to_route('angkorcmspages.edit', 'Edit', array($page->id), array('class' => 'btn btn-warning btn-block')) !!}</td>
								<td>
									{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmspages.destroy', $page->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this page ?\')')) !!}
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