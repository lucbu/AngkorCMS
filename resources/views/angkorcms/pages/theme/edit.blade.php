@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a theme</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmstemplates.angkorcmsthemes.update', $theme->template->id, $theme->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				{!! Form::hidden('template_id', $theme->template->id) !!}
				Name :
				<small class="text-danger">{{ $errors->first('theme') }}</small>
				<div class="form-group {{ $errors->has('theme') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', $theme->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>
				List of usable blocks :
				<ul>
					@foreach($theme->template->blocks as $block)
						<li>{{ $block->name }}</li>
					@endforeach
				</ul>
				<p>The path to the css is "css/{{$theme->template->name}}/{{$theme->name}}/{{$theme->style}}".</p>
				<p>The path to the js is "js/{{$theme->template->name}}/{{$theme->name}}/{{$theme->script}}".</p>
				<p>To edit the view, you should use 'Blade' (<a href="http://laravel.com/docs/5.0/templates">Doc here</a>)</p>
				<p>You can access bootstrap 3.3.2 (CSS) here : "css/bootstrap-3.3.2-dist/css/bootstrap.min.css".</p>
				<p>You can access bootstrap 3.3.2 (JS) here : "js/bootstrap.min.js".</p>
				<p>You can access jQuery 2.1.3 at "js/jquery-2.1.3.min.js"</p>
				<p>You have access to several variables:
					<ul>
						<li>$title (title of the page)</li>
						<li>$parameters (list of argument in the url after the page slug)</li>
						<li>$blocks (List of blocks, use it like "{{'{'}}!!AngkorBlade::display($blocks['blockName'], $parameters)!!{{'}'}}")</li>
					</ul></p>
				<div class="form-group">
					See image's url : (In CSS and JS just use the path to image with "../../../" before)
					{!! View::make('angkorcms/medias/form/imagesUrl')->with(array('path' => true)) !!}
				</div>

				{{$theme->style}} :
				<small class="text-danger">{{ $errors->first('style') }}</small>
				<div class="form-group {{ $errors->has('style') ? 'has-error has-feedback' : '' }}">
					{!! Form::textarea('style', $style, array('class' => 'form-control', 'placeholder' => 'style')) !!}
				</div>
				{{$theme->view}} :
				<small class="text-danger">{{ $errors->first('view') }}</small>
				<div class="form-group {{ $errors->has('view') ? 'has-error has-feedback' : '' }}">
					{!! Form::textarea('view', $view, array('class' => 'form-control', 'placeholder' => 'view')) !!}
				</div>
				{{$theme->script}} :
				<small class="text-danger">{{ $errors->first('script') }}</small>
				<div class="form-group {{ $errors->has('script') ? 'has-error has-feedback' : '' }}">
					{!! Form::textarea('script', $script, array('class' => 'form-control', 'placeholder' => 'script')) !!}
				</div>

				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
	{!! link_to_route('angkorcmstemplates.edit', 'Go back to the template', array($theme->template_id), array('class' => 'btn btn-primary btn-small')) !!}
</div>
@stop

@section('script')
	{!! View::make('angkorcms/medias/form/scriptImagesUrl') !!}
@stop