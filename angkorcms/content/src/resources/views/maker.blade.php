<h3> Editing the content : </h3>
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