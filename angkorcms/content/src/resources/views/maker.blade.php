<h3> Editing the content : </h3>
<div class="form-group">
	See image's url :
	{!! View::make('angkorcms/medias/form/imagesUrl')->with(array('folders' => $folders, 'imagesroot' => $images, 'path' => false)) !!}
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