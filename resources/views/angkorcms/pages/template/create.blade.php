@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Creating a template</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => 'angkorcmstemplates.store', 'method' => 'post', 'class' => 'form-horizontal panel')) !!}
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>
				{!! Form::submit('Create', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	{!! link_to_route('angkorcmstemplates.index', 'Go back to template', null, array('class' => 'btn btn-primary btn-small')) !!}
</div>
@stop