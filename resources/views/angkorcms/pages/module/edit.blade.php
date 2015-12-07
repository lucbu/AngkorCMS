@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a module</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmsmodules.update', $module->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				Language :
				<small class="text-danger">{{ $errors->first('lang_id') }}</small>
				<div class="form-group {{ $errors->has('lang_id') ? 'has-error has-feedback' : '' }}">
					{!! Form::select('lang_id', $langs, $module->lang_id, array('class' => 'form-control')) !!}
				</div>
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', $module->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>
				Title (Would be use as anchor):
				<small class="text-danger">{{ $errors->first('title') }}</small>
				<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('title', $module->title, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
				</div>
				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
			<br><br>
			<div class="col-sm-12">
				<small class="text-danger"><div id='moduleMakerError'></div></small>
				<div id="moduleMaker">
					@if(!is_null($module->nature))
						{!! View::make($view)->with(array('module_id' => $module->id)) !!}
					@endif
				</div>
			</div>
		</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-primary">
		<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	</a>
</div>
@stop
