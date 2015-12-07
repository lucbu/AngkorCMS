@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Creating a page</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => 'angkorcmspages.store', 'method' => 'post', 'class' => 'form-horizontal panel')) !!}
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>

				Theme :
				<small class="text-danger">{{ $errors->first('theme_id') }}</small>
				<div class="form-group {{ $errors->has('theme_id') ? 'has-error has-feedback' : '' }}">
					<select id="selectTheme" name="theme_id" class="form-control col-xs-2">
						@foreach($templates as $template)
						<optgroup label="{{ $template->name }}">
							@foreach($template->themes as $theme)
							<option value='{{ $theme->id }}'>
								{{ $theme->name }}
							</option>
							@endforeach
						</optgroup>
						@endforeach
					</select>
				</div>

				<small class="text-danger">{{ $errors->first('accessible') }}</small>
				<div class="form-group {{ $errors->has('accessible') ? 'has-error has-feedback' : '' }}">
					{!! Form::checkbox('accessible', 1) !!}
					This page will be accessible.
				</div>
				{!! Form::submit('Add', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-primary">
		<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	</a>
</div>
@stop