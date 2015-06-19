@extends('admin/admin')

@section('content')
<div class="col-sm-offset-4 col-sm-4">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Creating a translation for page {{$page->name}}</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmspages.angkorcmspagestrans.store', $page->id), 'method' => 'post', 'class' => 'form-horizontal panel')) !!}
				{!! Form::hidden('page_id', $page->id) !!}
				Language :
				<small class="text-danger">{{ $errors->first('lang_id') }}</small>
				<div class="form-group {{ $errors->has('lang_id') ? 'has-error has-feedback' : '' }}">
					{!! Form::select('lang_id', $langs, null, array('class' => 'form-control')) !!}
				</div>
				Slug :
				<small class="text-danger">{{ $errors->first('slug') }}</small>
				<div class="form-group {{ $errors->has('slug') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('slug', null, array('class' => 'form-control', 'placeholder' => 'Slug')) !!}
				</div>
				Title :
				<small class="text-danger">{{ $errors->first('title') }}</small>
				<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
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