<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Installation - @yield('title')</title>
		<!-- CSS -->
		<link href="{{ asset('/css/bootstrap-3.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">

		<!-- Fonts -->
		<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<!-- Scripts -->
		<script type="text/javascript" src="{{ asset('/js/jquery-2.1.3.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">Installation @yield('heading')</div>

						<div class="panel-body">
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
