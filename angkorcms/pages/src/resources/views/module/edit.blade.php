@extends('admin/admin')

@section('content')
<div class="col-sm-offset-1 col-sm-10">
	<br>
	<div class="panel panel-primary">
		<div class="panel-heading">Editing a module</div>
		<div class="panel-body">
			<div class="col-sm-12">
				{!! Form::open(array('route' => array('angkorcmsmodules.update', $module->id), 'method' => 'put', 'class' => 'form-horizontal panel')) !!}
				Language :
				<small class="text-danger">{{ $errors->first('lang_id') }}</small>
				<div class="form-group {{ $errors->has('lang_id') ? 'has-error has-feedback' : '' }}">
					{!! Form::select('lang_id', $langs, $module->lang_id, array('class' => 'form-control')) !!}
				</div>
				Name :
				<small class="text-danger">{{ $errors->first('name') }}</small>
				<div class="form-group {{ $errors->has('name') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('name', $module->name, array('class' => 'form-control', 'placeholder' => 'Name')) !!}
				</div>
				Title :
				<small class="text-danger">{{ $errors->first('title') }}</small>
				<div class="form-group {{ $errors->has('title') ? 'has-error has-feedback' : '' }}">
					{!! Form::text('title', $module->title, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
				</div>
				{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
				{!! Form::close() !!}
			</div>
			<br><br>
			<div class="col-sm-12">
				<small class="text-danger"><div id='moduleMakerError'></div></small>
				<div id="moduleMaker">
					@if(!is_null($module->nature))
						{!! View::make($view)->with(array('module_id' => $module->id)) !!}
					@endif
				</div>
			</div>
		</div>
	</div>
	<a href="javascript:history.back()" class="btn btn-primary">
		<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
	</a>
</div>
@stop

@section('script')

<script>
tinymce.init({
	selector: "textarea",
	theme: "modern",
	plugins: [
	"advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	"save table contextmenu directionality emoticons template paste textcolor"
	],
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
	style_formats: [
	{title: 'Bold text', inline: 'b'},
	{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
	{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
	{title: 'Example 1', inline: 'span', classes: 'example1'},
	{title: 'Example 2', inline: 'span', classes: 'example2'},
	{title: 'Table styles'},
	{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
	]
});
</script>
@endsection