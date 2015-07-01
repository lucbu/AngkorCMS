<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin - @yield('title', 'Back-End')</title>

		<!-- CSS -->
		<link href="{{ asset('/css/bootstrap-3.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- Scripts -->
		<script type="text/javascript" src="{{ asset('/js/jquery-2.1.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body style="margin:15px 0px;">
		<div class="col-sm-offset-1 col-sm-10">
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

		<div class="col-sm-offset-1 col-sm-10" id="listMedia">

		{!! Form::open(array('url' => '', 'files' => true, 'id' => 'addFolder', 'style'=>'display:inline;float:right;margin-right:15px;')) !!}
			{!! Form::hidden('folder_id', '', array('class' => 'folder_id_current')) !!}
			<small class="text-danger"><div id='errorFolder'></div></small>
			<div class="form-group" id='divFolder'>
				{!! Form::hidden('name', '', array('class' => 'form-control col-xs-3', 'id' => 'folder')) !!}
			</div>
			{!! Form::submit('Add Folder !', array('class' => 'btn btn-info pull-right', 'onclick' => 'getNameFolder();')) !!}
		{!! Form::close() !!}

			{!! View::make('angkorcms\medias\listMedia')->with(array('folders' => $folders, 'images' => $images)) !!}
		</div>
		{!! View::make('angkorcms\medias\mediamanagerform') !!}

		<!-- List of script -->
		{!! View::make('angkorcms\medias\script') !!}
	</body>
</html>
