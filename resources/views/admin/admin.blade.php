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
		<script type="text/javascript" src="{{ asset('/tinymce/tinymce.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/jquery-2.1.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
					</button>
					<a class="navbar-brand" href="#">AngkorCMS</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="{{ route('admin.index') }}"><span class="glyphicon glyphicon-cog"></span> Admin Panel</a></li>
						<li><a href="{{ route('angkorcms.medias') }}"><span class="glyphicon glyphicon-picture"></span> Medias</a></li>
						<li><a href="{{ route('angkorcmslang.index') }}"><span class="glyphicon glyphicon-globe"></span> Languages</a></li>
						<li><a href="{{ route('angkorcmstemplates.index') }}"><span class="glyphicon glyphicon-object-align-top"></span> Templates</a></li>
						<li><a href="{{ route('angkorcmspages.index') }}"><span class="glyphicon glyphicon-list-alt"></span> Pages</a></li>
						<li><a href="{{ route('angkorcmsmodules.index') }}"><span class="glyphicon glyphicon-inbox"></span> Modules</a></li>
						<li><a href="{{ route('angkorcmsusers.index') }}"><span class="glyphicon glyphicon-user"></span> Users</a></li>
					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		@if(Session::has('error'))
		<div class="alert alert-danger">{{ Session::get('error') }}</div>
		@endif
		@if(Session::has('ok'))
		<div class="alert alert-success">{{ Session::get('ok') }}</div>
		@endif
		@if(Session::has('info'))
		<div class="alert alert-info">{{ Session::get('info') }}</div>
		@endif
		@if(isset($error))
		<div class="alert alert-danger">{{ $error }}</div>
		@endif
		@if(isset($ok))
		<div class="alert alert-success">{{ $ok }}</div>
		@endif
		@if(isset($info))
		<div class="alert alert-info">{{ $info }}</div>
		@endif

		@yield('content')

		@yield('script')
	</body>
</html>
