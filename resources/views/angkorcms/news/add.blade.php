@extends('admin/admin')

@section('content')
    <br>
	<div class="col-sm-offset-1 col-sm-10">
		<div class="panel panel-info">
			<div class="panel-heading">Ajout d'un article</div>
			<div class="panel-body">
				{!! Form::open(array('url' => route('angkorcmsnews.store'))) !!}
					<small class="text-danger">{{ $errors->first('title') }}</small>
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						{!! Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
					</div>
					<div class="form-group">
						See image's url :
						{!! View::make('angkorcms/medias/form/imagesUrl')->with(array('folders' => $folders, 'imagesroot' => $images, 'path' => false)) !!}
					</div>
					<small class="text-danger">{{ $errors->first('content') }}</small>
					<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
						{!! Form::textarea ('content', null, array('class' => 'form-control', 'placeholder' => 'Content')) !!}
					</div>
					<small class="text-danger">{{ $errors->first('tags') }}</small>
					<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
						{!! Form::text('tags', null, array('class' => 'form-control', 'placeholder' => 'Tags (separated by commas)')) !!}
					</div>
					{!! Form::submit('Add', array('class' => 'btn btn-info pull-right')) !!}
				{!! Form::close() !!}
			</div>
		</div>
		<a href="javascript:history.back()" class="btn btn-primary">
			<span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
		</a>
	</div>
@stop

@section('script')

{!! View::make('angkorcms/medias/form/scriptImagesUrl') !!}
<script type="text/javascript" src="{{ asset('/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    relative_urls : false,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>
@stop