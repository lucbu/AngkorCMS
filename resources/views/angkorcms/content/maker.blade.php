<h3> Editing the content : </h3>
<div class="form-group">
	See image's url :
	{!! View::make('angkorcms/medias/form/imagesUrl')->with(array('path' => false)) !!}
</div>
<div id="formContent">
	<small class="text-danger"><div id='formAddSlideError'></div></small>
	{!! Form::open(array('url' => route("angkorcmscontent.updateContent", array($content->id)), 'method' => 'post', 'class' => 'form-horizontal panel', 'id' => 'updateContent')) !!}
		Content :
		<small class="text-danger text-danger-content"></small>
		<div class="form-group form-group-content">
			{!! Form::textarea('content', $content->content, array('class' => 'form-control', 'placeholder' => 'Content')) !!}
		</div>
		{!! Form::submit('Edit', array('class' => 'btn btn-primary pull-right')) !!}
	{!! Form::close() !!}
</div>
{!! View::make('angkorcms/medias/form/scriptImagesUrl') !!}

<script type="text/javascript" src="{{ asset('/tinymce/tinymce.min.js') }}"></script>
<script>
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