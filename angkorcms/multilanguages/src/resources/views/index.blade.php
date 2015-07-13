@extends('admin/admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Languages</div>
				<div class="panel-body">
		  			<div class="btn-group pull-right">
						<p>
							{!! link_to_route('angkorcmslang.create', 'New language', null, array('class' => 'btn btn-primary btn-block')) !!}
						</p>
					</div>
					<table class="table">
						<tr><th>#</th><th>Code</th><th>Description</th><th>Image</th><th>Edit</th><th>Delete</th></tr>
						@foreach ($langs as $lang)
							<tr>
								<td>{{ $lang->id }}</td>
								<td>{{ $lang->code }}</td>
								<td>{{ $lang->description }}</td>
								<td>@if(isset($lang->image))
								<img style="max-height:80px;max-width=80px;" src="{{$lang->image->url()}}" title="{{$lang->image->name}}" alt="{{$lang->image->name}}"/>
								@endif</td>
								<td>{!! link_to_route('angkorcmslang.edit', 'Edit', array($lang->id), array('class' => 'btn btn-warning btn-block')) !!}</td>
								<td>
									{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmslang.destroy', $lang->id))) !!}
									{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this languages ?\')')) !!}
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
