{!! Form::open(array('url' => '', 'files' => true, 'id' => 'delImage', 'method' => 'DELETE')) !!}
	{!! Form::hidden('image_id', '', array('id' => 'image_id_form')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'delFolder', 'method' => 'DELETE')) !!}
	{!! Form::hidden('folder_id', '', array('id' => 'folder_id_form')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'openFolder')) !!}
	{!! Form::hidden('folder_id', '', array('id' => 'folder_id_open')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'putImageFolder', 'method' => 'PUT')) !!}
	{!! Form::hidden('folder_id', '', array('id' => 'image_parent_folder_id')) !!}
	{!! Form::hidden('image_id', '', array('id' => 'image_id_to_move')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'putFolderParent', 'method' => 'PUT')) !!}
	{!! Form::hidden('folder_id', '', array('id' => 'folder_id_to_move')) !!}
	{!! Form::hidden('parent_folder_id', '', array('id' => 'folder_id_parent')) !!}
{!! Form::close() !!}

{!! Form::open(array('url' => '', 'files' => true, 'id' => 'addFolder', 'style'=>'display:inline;float:right;margin-right:15px;')) !!}
	{!! Form::hidden('folder_id', '', array('class' => 'folder_id_current')) !!}
	{!! Form::hidden('name', '', array('class' => 'form-control col-xs-3', 'id' => 'folder')) !!}
{!! Form::close() !!}
