@extends('admin/admin')

@section('content')
    <br>
	<div class="col-sm-offset-1 col-sm-10">
		<div class="panel panel-info">
			<div class="panel-heading">Edit a post</div>
			<div class="panel-body">
				{!! Form::open(array('url' => route('angkorcmsnews.update', [$post->id]), 'method' => 'put',)) !!}
					Language :
					<small class="text-danger">{{ $errors->first('lang_id') }}</small>
					<div class="form-group {{ $errors->has('lang_id') ? 'has-error has-feedback' : '' }}">
						{!! Form::select('lang_id', $langs, $post->lang_id, array('class' => 'form-control')) !!}
					</div>
					Title :
					<small class="text-danger">{{ $errors->first('title') }}</small>
					<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
						{!! Form::text('title', $post->title, array('class' => 'form-control', 'placeholder' => 'Title')) !!}
					</div>
					Slug :
					<small class="text-danger">{{ $errors->first('slug') }}</small>
					<div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
						{!! Form::text('slug', $post->slug, array('class' => 'form-control', 'placeholder' => 'Slug')) !!}
					</div>
					<div class="form-group">
						See image's url :
						{!! View::make('angkorcms/medias/form/imagesUrl')->with(array('folders' => $folders, 'imagesroot' => $images, 'path' => false)) !!}
					</div>
					<small class="text-danger">{{ $errors->first('content') }}</small>
					<div class="form-group {{ $errors->has('content') ? 'has-error' : '' }}">
						{!! Form::textarea ('content',  $post->content, array('class' => 'form-control', 'placeholder' => 'Content')) !!}
					</div>
					<small class="text-danger">{{ $errors->first('tags') }}</small>
					<div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
					{{--*/ $tags = "" /*--}}
						@foreach($post->tags as $tag)
						    {{--*/ $tags .= $tag->tag . ", " /*--}}
						@endforeach
						@if(strlen($tags)>0)
							{{--*/ $tags = substr($tags,0,strlen($tags)-2) /*--}}
						@endif
						{!! Form::text('tags', $tags, array('class' => 'form-control', 'placeholder' => 'Tags (separate by comma)')) !!}
					</div>
					{!! Form::submit('Edit', array('class' => 'btn btn-info pull-right')) !!}
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