@extends('admin/admin')

@section('content')
<div class="col-sm-offset-4 col-sm-4">
	<div class="panel panel-info">
		<div class="panel-heading">Upload a picture</div>
		<div class="panel-body">
			{!! Form::open(array('url' => '', 'files' => true, 'id' => 'uploadPicture')) !!}
			{!! Form::hidden('folder_id', '', array('class' => 'folder_id_current')) !!}
			<small class="text-danger"><div id='errorImage'></div></small>
			<div class="form-group" id='divImage'>
				{!! Form::file('image', array('class' => 'form-control', 'id' => 'image')) !!}
			</div>
			{!! Form::submit('Envoyer !', array('class' => 'btn btn-info pull-right hidden')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>

<div class="col-sm-offset-4 col-sm-4">
	<div class="panel panel-info">
		<div class="panel-body">
			{!! Form::open(array('url' => '', 'files' => true, 'id' => 'addFolder')) !!}
			{!! Form::hidden('folder_id', '', array('class' => 'folder_id_current')) !!}
			<small class="text-danger"><div id='errorFolder'></div></small>
			<div class="form-group" id='divFolder'>
				{!! Form::text('name', '', array('class' => 'form-control col-xs-3', 'id' => 'folder')) !!}
			</div>
			{!! Form::submit('Add Folder !', array('class' => 'btn btn-info pull-right')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
<div class="col-sm-offset-2 col-sm-8" id="listMedia">
	{!! View::make('angkorcms\medias\listMedia')->with(array('folders' => $folders, 'images' => $images)) !!}
</div>

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'delImage')) !!}
{!! Form::hidden('image_id', '', array('id' => 'image_id_form')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'delFolder')) !!}
{!! Form::hidden('folder_id', '', array('id' => 'folder_id_form')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'openFolder')) !!}
{!! Form::hidden('folder_id', '', array('id' => 'folder_id_open')) !!}
{!! Form::close() !!}

@stop

<!-- List of script -->
@section('script')
{!! View::make('angkorcms\medias\script') !!}
@stop
