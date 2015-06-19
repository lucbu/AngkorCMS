<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="{{asset('css/bootstrap-3.3.2-dist/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/Simple/Light/test.css')}}" />
        <script type="text/javascript" src="{{ asset('js/Simple/Light/script.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <title>{{$title}}</title>
    </head>

    <body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    {!! AngkorBlade::display($blocks['navbar'], $parameters, false, array(), array('list-class' => 'nav navbar-nav', 'lang-class' => 'nav navbar-nav navbar-right')) !!}
		</div>
	</div>
</nav>
        <div class="col-sm-offset-1 col-sm-10">
                {!! AngkorBlade::display($blocks['body'], $parameters, true, array('class'=>'modulebody'), array('slideshow-indicator' => false, "map-showMarkerName" => false, 'map-width' => '700px', 'map-height' => "300px", 'slideshow-interval' => 2000)) !!}
        </div>
        <div id="footer">
                {!! AngkorBlade::display($blocks['footer'], $parameters, false) !!}
        </div>
    </body>
</html>