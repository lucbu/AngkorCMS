@extends('admin/admin')

@section('content')
<div class="col-sm-offset-4 col-sm-4">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a language</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmslang.update', $lang->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				Code :
				<small class="text-danger">{{ $errors->first('code') }}</small>
				<div class="form-group {{ $errors->has('code') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('code', $lang->code, array('class' => 'form-control', 'placeholder' => 'Code')) !!}
				</div>
				Description :
				<small class="text-danger">{{ $errors->first('description') }}</small>
				<div class="form-group {{ $errors->has('description') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('description', $lang->description, array('class' => 'form-control', 'placeholder' => 'Description')) !!}
				</div>
				Choose an image :
				<small class="text-danger">{{ $errors->first('image_id') }}</small>
				<div class="form-group {{ $errors->has('image_id') ? 'has-error has-feedback' : '' }}">
					{!! View::make('angkorcms/medias/form/chooseOneImage')->with(array('object' => $lang)) !!}
				</div>

				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop

@section('form')
	{!! View::make('angkorcms\medias\mediamanagerform') !!}
@stop

@section('script')
	{!! View::make('angkorcms/medias/form/scriptChooseOneImage')->with('image_id', $lang->image_id) !!}
@stop