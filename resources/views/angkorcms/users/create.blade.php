@extends('admin/admin')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">
			<div class="panel-heading">Create an user</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::open(array('url' => route('angkorcmsusers.store'), 'method' => 'post', 'class' => 'form-horizontal panel')) !!}
						<small class="text-danger">{{ $errors->first('name') }}</small>
					  <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					  	{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
					  </div>
					  <small class="text-danger">{{ $errors->first('email') }}</small>
					  <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
					  	{!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Mail')) !!}
					  </div>
					  <small class="text-danger">{{ $errors->first('password') }}</small>
					  <div class="form-group {{ $errors->has('password') ? 'has-error has-feedback' : '' }}">
					  	{!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
					  </div>
					  <div class="form-group">
					  	{!! Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password confirmation')) !!}
					  </div>
						<div class="checkbox">
						  {!! Form::checkbox('admin') !!}Admin
						</div>
						{!! Form::submit('Send', array('class' => 'btn btn-primary pull-right')) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop