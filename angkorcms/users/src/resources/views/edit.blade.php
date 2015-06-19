@extends('admin/admin')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">
		<br>
		<div class="panel panel-primary">
			<div class="panel-heading">User's edit</div>
			<div class="panel-body">
				<div class="col-sm-12">
					{!! Form::open(array('url' => route('angkorcmsusers.update', array($user->id)), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
						<small class="text-danger">{{ $errors->first('name') }}</small>
					  <div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					  	{!! Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
					  </div>
					  <small class="text-danger">{{ $errors->first('email') }}</small>
					  <div class="form-group {{ $errors->has('email') ? 'has-error has-feedback' : '' }}">
					  	{!! Form::email('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Mail')) !!}
					  </div>
						<div class="checkbox">
						  {!! Form::checkbox('admin', 1, $user->admin) !!}Admin
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