@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a template</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmstemplates.update', $template->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', $template->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>
				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">Blocks</div>
		<div class="panel-body">
			{!! View::make('angkorcms/pages/block/listBlock')->with(array('blocks' => $template->blocks, 'template_id' => $template->id)) !!}
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">Themes</div>
		<div class="panel-body">
			<div class="btn-group pull-right">
				<p>
					{!! link_to_route('angkorcmstemplates.angkorcmsthemes.create', 'New theme', $template->id, array('class' => 'btn btn-primary btn-block')) !!}
				</p>
			</div>
			<table class="table">
				<tr><th>#</th><th>Name</th><th>Edit</th><th>Delete</th></tr>
				@foreach ($template->themes as $theme)
				<tr>
					<td>{{ $theme->id }}</td>
					<td>{{ $theme->name }}</td>
					<td>{!! link_to_route('angkorcmstemplates.angkorcmsthemes.edit', 'Edit', array($template->id, $theme->id), array('class' => 'btn btn-warning btn-block')) !!}</td>
					<td>
						{!! Form::open(array('method' => 'DELETE', 'route' => array('angkorcmstemplates.angkorcmsthemes.destroy', $template->id, $theme->id))) !!}
						{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Are you sure you want to delete this theme ?\')')) !!}
						{!! Form::close() !!}
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>
	{!! link_to_route('angkorcmstemplates.index', 'Go back to template', null, array('class' => 'btn btn-primary btn-small')) !!}
</div>
@stop