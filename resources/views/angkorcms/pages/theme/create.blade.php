@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Creating a theme</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmstemplates.angkorcmsthemes.store', $template_id), 'method' => 'post', 'files'=>true, 'class' => 'form-horizontal panel')) !!}
				{!! Form::hidden('template_id', $template_id) !!}
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>
				Style (***.css):
				<small class="text-danger">{{ $errors->first('style') }}</small>
				<div class="form-group {{ $errors->has('style') ? 'has-error has-feedback' : '' }}">
					{!! Form::file('style', array('class' => 'form-control', 'id' => 'style')) !!}
				</div>
				View (***.blade.php):
				<small class="text-danger">{{ $errors->first('view') }}</small>
				<div class="form-group {{ $errors->has('view') ? 'has-error has-feedback' : '' }}">
					{!! Form::file('view', array('class' => 'form-control', 'id' => 'view')) !!}
				</div>
				Script (***.js):
				<small class="text-danger">{{ $errors->first('script') }}</small>
				<div class="form-group {{ $errors->has('script') ? 'has-error has-feedback' : '' }}">
					{!! Form::file('script', array('class' => 'form-control', 'id' => 'script')) !!}
				</div>
				{!! Form::submit('Create', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop